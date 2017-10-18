<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Album extends Model
{
    protected $table = "albums";
    
    protected $fillable = [
        'title', 'idUser', 'idAlbumf'
    ];
        
    public function images() {
        return $this->hasMany('App\Image','idAlbum','id');
    }
        
    public function albums() {
        return $this->hasMany('App\Album','idAlbumf','id');
    }

    public function albumf() {
        return $this->belongsTo('App\Album','idAlbumf','id');
    }

    public function user() {
        return $this->belongsTo('App\User','idUser','id');
    }

    public function destroyA() {
        if($this->albums()->count()==0 || $this->images()->count()==0) {
            $this->delete();
        }
    }

    public function getPath() {
        $path = array();
        $a = $this;
        while(is_object($a)) {
            array_push($path,$a);
            $a = $a->albumf;
        }
        return array_reverse($path);
    }
}
