<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('uid');
            $table->string('title')->unique();
            $table->text('body');
            $table->timestamps();

            $table->index(['uid', 'created_at']);
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropForeign('posts_uid_foreign');
            $table->dropIndex('posts_uid_index');
            $table->dropColumn('uid');
        });
        Schema::dropIfExists('posts');
    }
};
