<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use App\User;

class Image extends Model
{
    protected $table = "images";
    
    protected $fillable = [
        'title','content','idAlbum','img','idUser','mode'
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

    public function image_user(){
        return $this->hasMany('App\Image_User','idImg','id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'tags_images', 'idImg', 'idTag');
    }

    public function shareWith(){
        return $this->belongsToMany('App\User', 'images_users', 'idImg', 'idUser');
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
        $image_user = $this->image_user;
        foreach($image_user as $iu){
            $iu->delete();
        }
        File::delete('storage/upload/'.$this->img);
        $this->delete();
    }

    public function sharedTo($idUser) {
        foreach($this->shareWith as $u) {
            if($u->id == $idUser) {
                return true;
            }
        }
        return false;
    }
}
