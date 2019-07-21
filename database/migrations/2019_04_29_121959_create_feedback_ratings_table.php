<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');
            $table->string('email');
            $table->string('book_title');
            $table->string('book_code');
            $table->float('rating');
            $table->string('feedback');
            $table->string('author_email');
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
        Schema::dropIfExists('feedback_ratings');
    }
}
