<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nurseries', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('city')->index();
            $table->string('district')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->unsignedTinyInteger('age_min')->default(0);   // months
            $table->unsignedTinyInteger('age_max')->default(72);  // months
            $table->unsignedInteger('capacity')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('has_meals')->default(false);
            $table->boolean('has_transport')->default(false);
            $table->boolean('is_bilingual')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurseries');
    }
};
