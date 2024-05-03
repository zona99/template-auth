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
            //add_role_jenjang_npsn
            $table->string('role')->default('sekolah');
            $table->string('jenjang')->nullable();
            $table->string('npsn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //dropColom
            $table->dropColumn('role');
            $table->dropColumn('jenjang');
            $table->dropColumn('npsn');
        });
    }
};
