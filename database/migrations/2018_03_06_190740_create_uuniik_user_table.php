<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUuniikUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uuniik_user', function (Blueprint $table) {
          $table->increments('user_id');
          $table->string('user_name')->nullable();
          $table->string('user_mail', 256);
          $table->string('user_password', 256);
          $table->string('user_subscribes', 256)->nullable();
          $table->string('user_tel')->nullable();
          $table->string('user_gender', 20)->nullable();
          $table->string('user_locale')->nullable();
          $table->text('user_description')->nullable();
          $table->string('user_job')->nullable();
          $table->string('user_website')->nullable();
          $table->date('user_birthday')->nullable();
          $table->string('user_card')->nullable();
          $table->date('user_birthday')->nullable();
          $table->numeric('user_like')->nullable();
          $table->numeric('user_dislike')->nullable();
          $table->string('user_moneymonth', 10)->nullable();
          $table->string('user_filename')->nullable();
          $table->string('user_coverfilename')->nullable();
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
        Schema::dropIfExists('uuniik_user');
    }
}
