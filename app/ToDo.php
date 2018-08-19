<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model {
    
    protected $table = 'todo_list';
    
    public function user() {
        return $this->belongsTo('App\UserToDo');
    }

}
