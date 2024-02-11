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
        Schema::table('todos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->after('done');
            $table->bigInteger('affectedTo')->default(0)->after('user_id');
            $table->bigInteger('affectedBy')->default(0)->after('affectedTo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('affectedTo');
            $table->dropColumn('affectedBy');
        });
    }
};
