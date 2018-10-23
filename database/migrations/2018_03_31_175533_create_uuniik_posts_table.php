<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUuniikPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uuniik_posts', function (Blueprint $table) {
          $table->increments('post_id');
          $table->string('post_type')->nullable();
          $table->string('post_userid');
          $table->string('post_title')->nullable();
          $table->string('post_content', 2000)->nullable();
          $table->string('post_link')->nullable();
          $table->string('post_embededlink')->nullable();
          $table->string('post_filename')->nullable();
          $table->string('post_location')->nullable();
          $table->string('post_videominiature')->nullable();
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
        Schema::dropIfExists('uuniik_posts');
    }
}
