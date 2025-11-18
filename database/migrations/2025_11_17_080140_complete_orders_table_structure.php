<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // --- 不要カラムを削除 ---
            $dropColumns = ['items', 'menu_ids', 'total', 'total_price'];
            foreach ($dropColumns as $col) {
                if (Schema::hasColumn('orders', $col)) {
                    $table->dropColumn($col);
                }
            }

            // --- 必要カラムを追加 ---
            if (!Schema::hasColumn('orders', 'menu_id')) {
                $table->unsignedBigInteger('menu_id')->after('id');
            }
            if (!Schema::hasColumn('orders', 'name')) {
                $table->string('name')->after('menu_id');
            }
            if (!Schema::hasColumn('orders', 'type')) {
                $table->string('type')->after('name');
            }
            if (!Schema::hasColumn('orders', 'quantity')) {
                $table->integer('quantity')->after('type');
            }
            if (!Schema::hasColumn('orders', 'price')) {
                $table->integer('price')->after('quantity');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            // --- 必要カラムを削除 ---
            $columnsToRemove = ['menu_id', 'name', 'type', 'quantity', 'price'];
            foreach ($columnsToRemove as $col) {
                if (Schema::hasColumn('orders', $col)) {
                    $table->dropColumn($col);
                }
            }

            // --- 古いカラムを戻す ---
            $oldColumns = [
                'items' => 'string',
                'menu_ids' => 'string',
                'total' => 'integer',
                'total_price' => 'integer',
            ];
            foreach ($oldColumns as $col => $type) {
                if (!Schema::hasColumn('orders', $col)) {
                    $table->$type($col)->nullable();
                }
            }
        });
    }
};
