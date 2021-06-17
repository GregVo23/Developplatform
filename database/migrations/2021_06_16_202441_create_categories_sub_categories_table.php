<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('category_id')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_sub_categories');
    }
}