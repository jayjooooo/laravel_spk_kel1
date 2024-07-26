<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_nilais_table.php
public function up()
{
    Schema::create('nilais', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('A1');
        $table->integer('A2');
        $table->integer('A3');
        $table->integer('A4');
        $table->integer('A5');
        $table->integer('A6');
        $table->integer('A7');
        $table->integer('A8');
        $table->integer('A9');
        $table->integer('A10');
        $table->integer('A11');
        $table->integer('A12');
        $table->integer('A13');
        $table->integer('A14');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
