<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareFile extends Model
{

    protected $table = 'files';
    protected $fillable = [
        'name', 'path', 'title', 'code', 'downloaded_times'
    ];
}