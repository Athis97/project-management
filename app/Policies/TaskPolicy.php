<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view-any Task');
    }

    public function view(User $user, Task $task)
    {
        return $user->can('view Task');
    }

    public function create(User $user)
    {
        return $user->can('create Task');
    }

    public function update(User $user, Task $task)
    {
        return $user->can('update Task');
    }

    public function delete(User $user, Task $task)
    {
        return $user->can('delete Task');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete-any Task');
    }

    public function replicate(User $user, Task $task)
    {
        return $user->can('replicate Task');
    }

    public function restore(User $user, Task $task)
    {
        return $user->can('restore Task');
    }

    public function restoreAny(User $user)
    {
        return $user->can('restore-any Task');
    }

    public function reorder(User $user)
    {
        return $user->can('reorder Task');
    }

    public function forceDelete(User $user, Task $task)
    {
        return $user->can('force-delete Task');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('force-delete-any Task');
    }
}
