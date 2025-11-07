<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrontUser extends Model
{
    use HasApiTokens, HasFactory;
    public $timestamps = false;
    protected $table = 'frontUser';
    protected $fillable = [
        'email',
        'username',
        'email',
        'password',
        'is_verified',
        'roles',
        'tel',
        'adresse',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function isVerified(): bool
    {
        return (bool) $this->is_verified;
    }

    public function markAsVerified(): self
    {
        $this->is_verified = true;
        $this->roles = 'ROLE_FRONT';
        return $this;
    }
    public function messages()
    {
        return $this->belongsToMany(Message::class, 'contact_message', 'frontUser_id', 'message_id');
    }
}
