<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('main_category_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('name',100)->nullable();
            $table->string('logo',100)->nullable();
            $table->string('creater',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        Schema::create('sub_category_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_category_id)')->nullable();
            $table->integer('product_id)')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
