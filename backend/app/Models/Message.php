<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'from_admin',
    ];

    public function users()
    {
        return $this->belongsToMany(FrontUser::class, 'contact_message', 'message_id', 'frontUser_id');
    }
}
