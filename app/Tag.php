<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag_Image;

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

        public function idUser($idImg, $idTag) {
            $tag = Tag_Image::where('idTag', '=', $idTag, 'and', 'idImg', '=', $idImg)->first();
            return $tag->idUser;
        }
}
