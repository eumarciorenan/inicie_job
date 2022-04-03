<?php

/*===========================================
=            Author: Márcio Renan           =
=            Company: INICIE                =
=            API: GoRest                    =
=            DOC: https://gorest.co.in/     =
=            Copyright (c) 2022             =
===========================================*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('api_id');
            $table->integer("post_id");
            $table->integer("user_id");
            $table->string("user_name");
            $table->string("user_email");
            $table->text("body");
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
