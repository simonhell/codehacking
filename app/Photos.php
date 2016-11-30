<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'path'
    ];

    protected $table = 'photos';

    public function user()
    {

    }
}
