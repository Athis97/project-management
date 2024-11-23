<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectInvitation extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'token'];

    public $timestamps = true;

    /**
     * Define the relationship with the Project model.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
