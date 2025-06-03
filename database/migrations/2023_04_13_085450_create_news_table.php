<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('specialcategory_id')->nullable();
            $table->integer('hit_count')->default('0');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->enum('status', ['Publish', 'Unpublish']);
            $table->date('date');
            $table->string('date_two');
            $table->tinyInteger('breaking_news')->default('0');
            $table->string('time');
            $table->string('month');
            $table->string('year');
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
        Schema::dropIfExists('news');
    }
}
