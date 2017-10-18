<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Image extends Model
{
    protected $table = "images";
    
        protected $fillable = [
            'title','content','idAlbum','img','idUser'
        ];
    
        public function album(){
            return $this->belongsTo('App\Album','idAlbum','id');
        }
    
        public function user(){
            return $this->belongsTo('App\User','idUser','id');
        }
    
        public function comments(){
            return $this->hasMany('App\Comment','idImg','id');
        }

        public function tag_image(){
            return $this->hasMany('App\Tag_Image','idImg','id');
        }
    
        public function tags(){
            return $this->belongsToMany('App\Tag', 'tags_images', 'idImg', 'idTag');
        }

        public function destroyI(){
            $comments = $this->comments;
            foreach($comments as $c){
                $c->delete();
            }
            $tags = $this->tag_image;
            foreach($tags as $t){
                $t->destroyTI();
            }
            File::delete('storage/upload/'.$this->img);
            $this->delete();
        }
}
