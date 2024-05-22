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
        Schema::table('taches', function (Blueprint $table) {
            $table->string('nom');
            $table->text('description');
            $table->string('priorité');
            $table->Date('dateEchéance');
            $table->unsignedBigInteger('apprenant_id')->nullable();
            $table->foreign('apprenant_id')->references('id')->on('personnes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->dropColumn('nom');
            $table->dropColumn('description');
            $table->dropColumn('priorité');
            $table->dropColumn('dateEchéance');
            $table->dropColumn('apprenant_id');
        });
    }
};
