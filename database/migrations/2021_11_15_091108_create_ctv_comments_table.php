<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtvCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctv_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->text('content');
            $table->foreign('post_id')->references('id')->on('ctv_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('ctv_comments');
    }
}
