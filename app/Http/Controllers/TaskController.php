<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\TaskMail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use App\Contracts\TaskContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Exceptions\UnauthorizedException;
use App\Http\Requests\{TaskStore, TaskUpdate};
use App\Http\Resources\{Task, TaskCollection};

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends MainController
{

    /**
     * @var TaskContract
     */
    protected $taskContract;

    /**
     * @var Authenticatable|null
     */
    private $user;

    /**
     * @var
     */
    private $taskUserId;


    /**
     * PermissionController constructor.
     *
     * @param TaskContract $taskContract
     */
    public function __construct(TaskContract $taskContract)
    {
        $this->taskContract = $taskContract;

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->response->success(
            new TaskCollection($this->taskContract
                ->paginate(request('perPage', 15))
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskStore $request
     *
     * @return JsonResponse
     */
    public function store(TaskStore $request)
    {
        if ($this->forbidden($request['user_id'])) {
            throw new UnauthorizedException(403);
        }

        $task = new Task($this->taskContract->store([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => $this->taskUserId,
            'due_date' => $request['due_date'],
            'status' => 'TODO',
            'type' => $request['type'] ?? 'PRIVATE'
        ]));

        // Comment this line & uncomment the next line if you don't need to use queues
        SendEmail::dispatch($task);
//        Mail::to($task->user()->first())->send(new TaskMail($task));

        return $this->response->success($task);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        return $this->response->success(
            new Task($this->taskContract->show($id))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskUpdate $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function update(TaskUpdate $request, $id)
    {
        $task = $this->taskContract->show($id);
        if ($this->forbidden($task->user_id, $task->type == 'PUBLIC')) {
            throw new UnauthorizedException(403);
        }

        $task->update($request->all());
        return $this->response->success(
            new Task($this->taskContract->show($id))
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $task = $this->taskContract->show($id);
        if ($this->forbidden($task->user_id, $task->type == 'PUBLIC')) {
            throw new UnauthorizedException(403);
        }

        $task->delete();
        return $this->response->success([
            'message' => 'Task deleted successfully.'
        ]);
    }


    /**
     * Check if the user is not authorized to do operations
     *
     * @param null $user_id
     * @param bool $public
     *
     * @return bool
     */
    private function forbidden($user_id = null, $public = false)
    {
        $this->user = Auth::user();
        $this->taskUserId = $user_id ?? $this->user->id;

        return
            $this->user->id != $this->taskUserId &&
            !$this->user->hasRole('super.admin') &&
            !$public;
    }

}
