<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogcmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcmt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment')->nullable();
            $table->string('id_blog')->nullable();
            $table->string('id_user')->nullable();
            $table->string('avatar')->nullable();
            $table->text('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogcmt');
    }
}
