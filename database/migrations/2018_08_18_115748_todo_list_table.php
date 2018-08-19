<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TodoListTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('todo_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 60);
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('todo_list');
    }

}
