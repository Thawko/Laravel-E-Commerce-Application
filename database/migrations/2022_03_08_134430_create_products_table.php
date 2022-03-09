<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("title",150);
            $table->string("description")->nullable();
            $table->string("image",75)->nullable();
            $table->integer("category_id")->nullable();
            $table->integer("user_id")->nullable();
            $table->float("price")->nullable();
            $table->integer("quantity")->nullable()->default(1);
            $table->integer("minquantity")->nullable()->default(5);
            $table->integer("tax")->nullable()->default(18);
            $table->text("detail")->nullable();
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('products');
    }
}
