<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedTag extends Model
{
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo('App\Projects');
    }
    public function tagslist()
    {
        return $this->belongsTo('App\TagsList', 'id');
    }
}
