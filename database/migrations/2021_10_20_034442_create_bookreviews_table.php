<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookreviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->integer('rating');
            $table->timestamps();

            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookreviews', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('bookreviews');
    }
}
