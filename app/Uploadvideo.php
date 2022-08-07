<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadvideo extends Model
{
    public function playlist()
    {
        return $this->belongsTo('App\Playlist', 'playlist_id');
    }
}
