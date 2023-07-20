<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareFile extends Model
{

    protected $fillable = [
        'file_name', 'file_path', 'title', 'code',
    ];
}
