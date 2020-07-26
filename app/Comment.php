<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    const UPDATED_AT = null;

    public function page(){
        return $this->belongsTo('App\Page');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
