<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blograte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blograte', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rate')->nullable();
            $table->string('id_blog')->nullable();
            $table->text('id_user')->nullable();
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
        Schema::dropIfExists('Blograte');
    }
}
