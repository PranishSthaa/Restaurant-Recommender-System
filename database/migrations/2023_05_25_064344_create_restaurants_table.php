<?php

use App\Models\Cuisine;
use App\Models\RestTypes;
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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->string('address');
            $table->string('contact');
            $table->boolean('online_order');
            $table->integer('avg_cost_min');
            $table->integer('avg_cost_max');
            $table->foreignId('cuisine_id')->constrained();
            $table->foreignId('rest_type_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
