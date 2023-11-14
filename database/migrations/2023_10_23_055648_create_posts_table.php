<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return avoid
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->longtext('body');
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return avoid
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
;