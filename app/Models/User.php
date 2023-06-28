<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'isAdmin', 'lastLogin', 'isSuspended'];

    protected $table = 'user';

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'user_project', 'userId', 'projectId');
    }

    public function managed()
    {
        return $this->hasMany(Projects::class, 'managerId');
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'userId');
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
