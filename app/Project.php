<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'd-m-y';

    public function applied_tags() {
        return $this->hasMany('App\AppliedTag');
    }
}
