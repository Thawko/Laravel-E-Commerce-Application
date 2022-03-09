<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer("parent_id")->default(0);
            $table->string("title",50);
            $table->string("description")->nullable();
            $table->string("image",100)->nullable();
            $table->integer("status")->default(0);
            $table->timestamps();
        });
    }
/*
            $table->string("title",150);
            $table->string("keywords")->nullable();
            $table->string("description")->nullable();
            $table->string("image",75)->nullable();
            $table->integer("category_id")->nullable();
            $table->integer("user_id")->nullable();
            $table->float("price")->nullable();
            $table->integer("quantity")->nullable();
            $table->integer("minquantity")->nullable();
            $table->integer("tax")->nullable();
            $table->text("detail")->nullable();
            $table->string("slug",100)->nullable();
            $table->string("status",5)->nullable();
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
