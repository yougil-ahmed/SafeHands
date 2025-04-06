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
        Schema::create('option_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('package_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('package_options')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('service_packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_values');
    }
};
