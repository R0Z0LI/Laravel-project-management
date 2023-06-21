<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';

    protected $fillable = ['name', 'description', 'status', 'isArchived', 'managerId'];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project', 'projectId', 'userId');
    }

}
