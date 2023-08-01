<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class UserRole extends Model
{
    use HasFactory, HasRoles;
    public $table = 'user_roles';

    protected $fillable = [
        'id',
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
    ];

}
