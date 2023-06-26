<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task';

    protected $fillable = ['name', 'description', 'status', 'isArchived', 'userId', 'project_id'];

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function users() {
        return $this->belongsTo(User::class, 'userId');
    }

    public function userprojectss() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
