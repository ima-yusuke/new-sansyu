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
        Schema::table('event_details', function (Blueprint $table) {
            //
            $table->longText("insert")->nullable()->change();
            $table->longText("attributions")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_details', function (Blueprint $table) {
            //
            $table->longText("insert")->nullable(false)->change();
            $table->longText("attributions")->nullable(false)->change();
        });
    }
};
