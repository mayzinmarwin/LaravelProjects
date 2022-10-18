<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name',100)->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->text('country_id')->nullable();
            $table->text('tin')->nullable();
            $table->string('creater',100)->nuallable();
            $table->string('slug',100)->nuallable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('companies');
    }
}
