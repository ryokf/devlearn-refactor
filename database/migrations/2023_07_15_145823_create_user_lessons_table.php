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
        Schema::create('user_lessons', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('lesson_id')->constrained('lessons')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->boolean('status')->default(false);
            // $table->id();
            $table->unsignedBiginteger('user_id')->unsigned();
            $table->unsignedBiginteger('lesson_id')->unsigned();
            $table->boolean('status')->default(false)->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')
                ->on('lessons')->onDelete('cascade');
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
        Schema::dropIfExists('user_lessons');
    }
};
