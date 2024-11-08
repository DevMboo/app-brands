<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unity', function (Blueprint $table) {
            $table->id();
            $table->string('name_fantasy');
            $table->string('company_name');
            $table->string('cnpj');
            $table->bigInteger('flag_id')->unsigned()->nullable();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unity');
    }
};
