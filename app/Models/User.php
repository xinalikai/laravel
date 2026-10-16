<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'login',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            if (empty($user->role_id)) {
                $readerRole = Role::where('name', 'reader')->first();
                $user->role_id = $readerRole?->id;
            }
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function texts()
    {
        return $this->hasMany(Text::class);
    }

    public function isAdmin(): bool
    {
        return $this->role?->name === 'admin';
    }

    public function isJournalist(): bool
    {
        return in_array($this->role?->name, ['admin', 'journalist']);
    }
}