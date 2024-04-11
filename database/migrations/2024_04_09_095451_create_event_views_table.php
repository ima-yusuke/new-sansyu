<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('create or replace view event_views as select x.id as id, x.date as date, x.title as title, x.category_id as category_id, y.category_name as category_name, x.created_at as created_at, x.updated_at as updated_at from events as x left join categories as y on x.category_id = y.id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_views');
    }
};
