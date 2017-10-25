<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *  1. sub_id
     *  2. cat_name
     *  3. body
     *  4. status
     *  5. timestamp
     *  6. cat_id
     *  7. user_id
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_name');            
            $table->text('sub_body')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('cate_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('cate_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('sub_categories');
    }
}
