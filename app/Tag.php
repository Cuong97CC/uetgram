<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    
        protected $fillable = [
            'content',
        ];

        public function tag_image(){
            return $this->hasMany('App\Tag_Image','idTag','id');
        }
    
        public function images(){
            return $this->belongsToMany('App\Image', 'tags_images', 'idTag', 'idImg');
        }

        public function user(){
            return $this->belongsTo('App\User','idUser','id');
        }

}
