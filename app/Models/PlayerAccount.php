<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_email',
        'email_type',
        'player_id',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
