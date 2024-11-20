<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class TeamUser extends Pivot
{
    protected $table = 'team_user';

    protected $fillable = ['team_id', 'user_id', 'role_id'];

    /**
     * Define the relationship with the team.
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Define the relationship with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship with the role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
