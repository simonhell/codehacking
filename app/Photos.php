<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'path'
    ];

    protected $placeholder = 'placeholder.png';
    protected $directory = '/images/';
    protected $table = 'photos';

    public function user()
    {

    }

    public function getPathAttribute($photo)
    {
        if($photo != null)
            return $this->directory . $photo ;
        else
            return $this->directory . $this->placeholder;
    }

    public static function placeholder()
    {
        $placeholder = 'placeholder.png';
        $directory = '/images/';

        return $directory . $placeholder;
    }
}
