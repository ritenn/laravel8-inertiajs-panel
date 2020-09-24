<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function firstOrCreate(array $validated)
    {
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
