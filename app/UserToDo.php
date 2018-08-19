<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToDo extends Model {

    protected $table = 'users';
    
    public function tasks() {
        return $this->hasMany('App\ToDo');
    }

}
