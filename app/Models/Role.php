<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;


class Role extends Model
{
    use HasFactory, HasPermissions;

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);

    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);

    // }
}
