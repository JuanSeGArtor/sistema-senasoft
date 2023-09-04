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
        Schema::table('criterios', function (Blueprint $table) {
            $table->dropColumn('fechaInicio');
            $table->dropColumn('fechaFin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('criterios', function (Blueprint $table) {
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
        });
    }
};
