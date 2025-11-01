<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTemperatureFromMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::table('menus', function (Blueprint $table) {
        $table->dropColumn('temperature');
    });
}

public function down(): void
{
    Schema::table('menus', function (Blueprint $table) {
        $table->string('temperature')->nullable();
    });
}

}
