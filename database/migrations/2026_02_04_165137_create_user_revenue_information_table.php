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
        Schema::create('user_revenue_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('previous_3_years_arrears');
            $table->string('arrears_of_last_3_years');
            $table->string('current_year_demand_and_surcharge');
            $table->string('total_demand');
            $table->string('total_arrear');
            $table->string('total_collection');
            $table->string('total_balance');
            $table->longText('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_revenue_information');
    }
};
