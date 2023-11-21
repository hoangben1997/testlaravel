<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myProduct', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->string('price')->nullable();
            $table->string('id_category')->nullable();
            $table->string('id_brand')->nullable();
            $table->unsignedInteger('status')->default(1)->comment='1:new 2:sale';
            $table->string('sale')->nullable();
            $table->text('company')->nullable();
            $table->string('avatar')->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('myProduct');
    }
}
