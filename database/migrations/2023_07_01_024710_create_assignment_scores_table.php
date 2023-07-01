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
        Schema::create('assignment_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id');
            $table->foreignId('user_id');
            $table->decimal('score')->default(0);
            $table->text('file');
            $table->text('explanation');
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
        Schema::dropIfExists('assignment_scores');
    }
};
