<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function members()
    {
        return $this->hasManyThrough(
            TeamUser::class,
            Team::class,
            'project_id',
            'team_id',
            'id',
            'id'
        );
    }

    public function team()
    {
        return $this->hasOne(Team::class,'project_id');
    }

    public function invitations()
    {
        return $this->hasMany(ProjectInvitation::class);
    }
}
