<?php

namespace App\Policies;

use App\Models\TeamUser;
use App\Models\User;

class TeamUserPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view-any TeamUser');
    }

    public function view(User $user, TeamUser $teamUser)
    {
        return $user->can('view TeamUser');
    }

    public function create(User $user)
    {
        return $user->can('create TeamUser');
    }

    public function update(User $user, TeamUser $teamUser)
    {
        return $user->can('update TeamUser');
    }

    public function delete(User $user, TeamUser $teamUser)
    {
        return $user->can('delete TeamUser');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete-any TeamUser');
    }

    public function replicate(User $user, TeamUser $teamUser)
    {
        return $user->can('replicate TeamUser');
    }

    public function restore(User $user, TeamUser $teamUser)
    {
        return $user->can('restore TeamUser');
    }

    public function restoreAny(User $user)
    {
        return $user->can('restore-any TeamUser');
    }

    public function reorder(User $user)
    {
        return $user->can('reorder TeamUser');
    }

    public function forceDelete(User $user, TeamUser $teamUser)
    {
        return $user->can('force-delete TeamUser');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('force-delete-any TeamUser');
    }
}
