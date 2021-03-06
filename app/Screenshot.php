<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
