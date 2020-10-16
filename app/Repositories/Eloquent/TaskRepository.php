<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryAbstract;
use App\Contracts\TaskContract;
use App\Entities\Task;

/**
 * Class TaskRepository
 * @package App\Repositories
 */
class TaskRepository extends RepositoryAbstract implements TaskContract
{
    /**
     * @return string
     */
    public function entity()
    {
        return Task::class;
    }
}
