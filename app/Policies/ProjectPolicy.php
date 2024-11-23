<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view-any Project', 'web');
    }

    public function view(User $user, Project $project)
    {
        return $user->hasPermissionTo('view Project', 'web');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create Project', 'web');
    }

    public function update(User $user, Project $project)
    {
        return $user->hasPermissionTo('update Project', 'web');
    }

    public function delete(User $user, Project $project)
    {
        return $user->hasPermissionTo('delete Project', 'web');
    }

    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete-any Project', 'web');
    }

    public function replicate(User $user, Project $project)
    {
        return $user->hasPermissionTo('replicate Project', 'web');
    }

    public function restore(User $user, Project $project)
    {
        return $user->hasPermissionTo('restore Project', 'web');
    }

    public function restoreAny(User $user)
    {
        return $user->hasPermissionTo('restore-any Project', 'web');
    }

    public function reorder(User $user)
    {
        return $user->hasPermissionTo('reorder Project', 'web');
    }

    public function forceDelete(User $user, Project $project)
    {
        return $user->hasPermissionTo('force-delete Project', 'web');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->hasPermissionTo('force-delete-any Project', 'web');
    }
}
