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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role')->default(USER_ROLE)->after('password');
            $table->string('city_corporation')->nullable()->after('role');
            $table->string('jln')->nullable()->after('city_corporation');
            $table->string('thana')->nullable()->after('jln');
            $table->string('district')->nullable()->after('thana');
            $table->string('holding_no')->nullable()->after('district');
            $table->string('khotian_no')->nullable()->after('holding_no');
            $table->string('owner_share')->nullable()->after('khotian_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
