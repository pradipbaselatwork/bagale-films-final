<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    public function subcategories(){
        return $this->hasMany('App\Navbar','parent_id')->where('status',1);
    }

    public function parentcategory(){
        return $this->belongsTo('App\Navbar','parent_id')->select('id','category_name');
    }

}
