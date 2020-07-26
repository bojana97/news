<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';

    public function page(){
        return $this->belongsTo('App\Page');
    }
}
