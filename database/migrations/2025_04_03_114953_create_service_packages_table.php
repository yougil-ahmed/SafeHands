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
        Schema::create('service_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('name'); // اسم الباقة (Basic, Standard, Premium)
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable(); // السعر الثابت
            // $table->decimal('price_per_hour', 10, 2)->nullable(); // السعر لكل ساعة
            $table->integer('delivery_time')->nullable(); // مدة التسليم اختيارية
            $table->integer('revisions')->nullable(); // عدد التعديلات اختيارياً
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_packages');
    }
};
