<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLightnovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lightnovels', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ln_name');
            $table->text('volume_name')->nullable();
            $table->text('part_name')->nullable();
            $table->integer('volume_index');
            $table->integer('part_index');
            $table->longText('content');
            $table->integer('index');
            $table->softDeletes();
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
        Schema::dropIfExists('lightnovels');
    }
}
