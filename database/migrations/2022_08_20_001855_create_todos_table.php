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
        Schema::create('todos', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('uid');
            $table->string('title')->unique();
            $table->boolean('complated')->default(1);
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
        Schema::table('todos', function(Blueprint $table){
            $table->dropForeign('todos_uid_foreign');
            $table->dropIndex('todos_uid_index');
            $table->dropColumn('uid');
        });
        Schema::dropIfExists('todos');
    }
};
