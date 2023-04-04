<?php

namespace App\Models\Acl;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role'];

    // protected $hidden = ['pivot'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }


    // Functions
    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            $model->load(['modules']);
            $model->resources()->delete();
        });
    }

}
