<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            // nullable will create the null default value
            // $table->unsignedBigInteger('user_id')->nullable();  // commenting because doing the migration from the fresh
            // $table->unsignedBigInteger('user_id');

            if (env('DB_CONNECTION') === 'sqlite_testing') {
                $table->unsignedBigInteger('user_id')->default(1);
            } else {
                $table->unsignedBigInteger('user_id');
            }

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
