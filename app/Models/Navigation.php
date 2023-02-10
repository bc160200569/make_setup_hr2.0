<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Navigation extends Model
{
    use HasFactory;


    public function navrole()
    {
        return $this->belongsToMany(Role::class, 'role_has_navigations');
    }
}
