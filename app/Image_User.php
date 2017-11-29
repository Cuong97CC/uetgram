<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_User extends Model
{
    protected $table = "images_users";
    
    protected $fillable = [
        'idImg','idUser',
    ];
}
