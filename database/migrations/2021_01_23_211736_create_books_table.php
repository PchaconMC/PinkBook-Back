<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->notNullValue();
            $table->string('isbn')->notNullValue();
            $table->string('author')->notNullValue();
            $table->text('summary')->notNullValue();
            $table->float('averach')->notNullValue();
            $table->float('price')->notNullValue();
            $table->unsignedBigInteger('category_id')->notNullValue();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->unsignedBigInteger('user_id')->notNullValue();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
