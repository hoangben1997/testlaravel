<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauthuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauthu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten');
            $table->string('tuoi', 2);
            $table->string('quoctich');
            $table->string('vitri');
            $table->string('luong',100);
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
        Schema::dropIfExists('cauthu');
    }
}
