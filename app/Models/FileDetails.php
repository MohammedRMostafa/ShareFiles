<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id', 'ip', 'user_agent', 'country',
    ];
}