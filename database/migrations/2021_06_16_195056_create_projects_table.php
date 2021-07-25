<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('sub_category_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            
            $table->string('name');
            $table->json('document')->nullable();
            $table->string('picture')->nullable();
            $table->text('about');

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->integer('number')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->integer('price')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->timestamp('done')->nullable()->default(null);
            $table->boolean('notifications')->default(true);
            $table->boolean('rules')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
