<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public $timestamps = false;



    public function pages()
    {
        return $this->belongsToMany(Page::class, 'category_page', 'category_id', 'page_id');
    }


    public function getRouteKeyName()
    {
        return 'category';
    }

}
