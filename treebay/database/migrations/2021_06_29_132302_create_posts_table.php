<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('category_id')->default(1);
            $table->foreignId('type_id')->default(1);
            $table->foreignId('user_id')->default(1);
            $table->string('author')->default('name');
            $table->string('title');
            $table->string('lang')->default('en');
            $table->integer('price');
            $table->smallInteger('surface_area')->nullable();
            $table->mediumText('location')->nullable();
            $table->mediumText('description');
            $table->string('picture');
            $table->timestamps();
            $table->timestamp('published_at')->format('Y-m-d')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}