<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function uploadvideo()
    {
        return $this->hasMany('App\Uploadvideo', 'playlist_id');
    }
}
