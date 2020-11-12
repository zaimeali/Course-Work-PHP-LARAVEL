<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadeDeleteToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['blog_post_id']);
            $table
                ->foreign('blog_post_id')
                ->references('id')
                ->on('blog_posts')
                ->onDelete('cascade'); // cascade operation
            // what it will do when blog post will delete it will
            //     delete all the comments to which is related to that blog post
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['blog_post_id']);
            $table
                ->foreign('blog_post_id')
                ->references('id')
                ->on('blog_posts');
        });
    }
}
