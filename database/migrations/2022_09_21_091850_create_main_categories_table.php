<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('logo',100)->nullable();
            $table->string('creater',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        Schema::create('main_category_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_category_id)')->nullable();
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
        Schema::dropIfExists('main_categories');
    }
}
