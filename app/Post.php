<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'countries';
    protected $fillable = [
        'title_ar' , 'title_en' , 'description_en' , 'description_ar' , 'appearance' , 'img1' ,'img2'
    ];



}
