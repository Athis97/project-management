<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;

class TeamPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view-any Team');
    }

    public function view(User $user, Team $team)
    {
        return $user->can('view Team');
    }

    public function create(User $user)
    {
        return $user->can('create Team');
    }

    public function update(User $user, Team $team)
    {
        return $user->can('update Team');
    }

    public function delete(User $user, Team $team)
    {
        return $user->can('delete Team');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete-any Team');
    }

    public function replicate(User $user, Team $team)
    {
        return $user->can('replicate Team');
    }

    public function restore(User $user, Team $team)
    {
        return $user->can('restore Team');
    }

    public function restoreAny(User $user)
    {
        return $user->can('restore-any Team');
    }

    public function reorder(User $user)
    {
        return $user->can('reorder Team');
    }

    public function forceDelete(User $user, Team $team)
    {
        return $user->can('force-delete Team');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('force-delete-any Team');
    }
}
