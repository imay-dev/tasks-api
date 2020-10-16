<?php

namespace App\Mail;

use App\Http\Resources\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The task instance.
     *
     * @var Task
     */
    public $task;

    /**
     * Create a new message instance.
     *
     * @param Task $task
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.task_created')
            ->with([
                'title' => $this->task->title,
                'description' => $this->task->description
            ]);
    }
}
