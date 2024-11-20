<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'owner_id', 'project_id'];

    /**
     * Define the relationship with the team owner (User).
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Define the relationship with team members (Users).
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user', 'team_id', 'user_id')
            ->using(TeamUser::class)
            ->withPivot('role_id')
            ->withTimestamps();
    }

    /**
     * Define the relationship with project (one project can have many teams).
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
