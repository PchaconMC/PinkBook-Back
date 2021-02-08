<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnImageBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('image')->notNullValue()
            ->default("")
            ->after("title");
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image')->notNullValue()
            ->default("")
            ->after("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn("image");
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn("image");
        });

    }
}
