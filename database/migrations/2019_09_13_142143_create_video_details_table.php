<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->unsignedInteger('category_id');
            $table->string('image')->nullable();
            $table->integer('assess')->default(0);
            $table->time('time');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('updated_id')->nullable();
            $table->boolean('active')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('video-details');
    }
}
