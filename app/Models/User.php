<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'contact_user', 'user_id', 'contact_id');
    }

    public function notInFavorites(self $user): bool
    {
        return ! $this->favorites->contains($user);
    }
}
