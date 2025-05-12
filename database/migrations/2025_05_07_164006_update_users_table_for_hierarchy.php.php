<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove a coluna sector_id e sua foreign key (se existir)
            if (Schema::hasColumn('users', 'sector_id')) {
                $table->dropForeign(['sector_id']);
                $table->dropColumn('sector_id');
            }

            // Adiciona supervisor_id como auto-relação
            $table->unsignedBigInteger('supervisor_id')->nullable()->after('id');
            $table->foreign('supervisor_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['supervisor_id']);
            $table->dropColumn('supervisor_id');

            // Restaura a coluna sector_id se for necessário no rollback
            $table->unsignedBigInteger('sector_id')->nullable()->after('id');
            $table->foreign('sector_id')
                ->references('id')->on('sectors')
                ->onDelete('set null');
        });
    }
};
