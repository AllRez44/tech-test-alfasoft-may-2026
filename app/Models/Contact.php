<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const MAX_CONTACT_LENGTH = 9;

    protected $fillable = [
        'name',
        'email',
        'contact',
    ];
}
