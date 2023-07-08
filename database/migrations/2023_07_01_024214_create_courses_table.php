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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->foreignId('author_id');
            $table->foreignId('category_id');
            $table->text('description');
            $table->text('photo');
            $table->text('price');
            $table->integer('voucher_id');
            $table->enum('status', ['berjalan', 'perbaikan', 'selesai'])->default('berjalan');
            $table->boolean('is_public')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
