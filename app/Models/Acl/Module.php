<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
