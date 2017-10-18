<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag_Image;

class Tag_Image extends Model
{
    protected $table = "tags_images";

    protected $fillable = [
        'idTag','idImg',
    ];

    public function tag(){
        return $this->belongsTo('App\Tag','idTag','id');
    }

    public function destroyTI() {
        $idTag = $this->idTag;
        $tag = $this->tag;
        $this->delete();
        $tags = Tag_Image::where('idTag', '=', $idTag)->get();
        if($tags->count() == 0){
            $tag->delete();
        }
    }
}
