<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     *  1. art_id
     *  2. article_title
     *  3. article_body (article content / detail)
     *  4. image
     *  5. created_at
     *  6. publish_on (timestamp)
     *  7. isPublish
     *  8. user_id
     *  9. sub_id
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('image');
            $table->timestamp('publish_on');
            $table->tinyInteger('is_publish')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('sub_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('sub_id')
                  ->references('id')->on('sub_categories')
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
        Schema::dropIfExists('articles');
    }
}
