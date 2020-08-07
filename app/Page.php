<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Unisharp\Ckeditor\ServiceProvider;


class Page extends Model
{
    protected $table = 'page';
    public $timestamps = true;

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function files(){
        return $this->hasMany('App\File');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_page', 'page_id', 'category_id');
    }

}
