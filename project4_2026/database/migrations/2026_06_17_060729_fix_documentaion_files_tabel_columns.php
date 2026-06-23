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
        if (! Schema::hasColumn('documentaion_files_tabel', 'title')) {
            Schema::table('documentaion_files_tabel', function (Blueprint $table) {
                $table->string('title')->after('id');
            });
        }

        if (! Schema::hasColumn('documentaion_files_tabel', 'file_path')) {
            Schema::table('documentaion_files_tabel', function (Blueprint $table) {
                $table->string('file_path')->after('title');
            });
        }

        if (! Schema::hasColumn('documentaion_files_tabel', 'file_type')) {
            Schema::table('documentaion_files_tabel', function (Blueprint $table) {
                $table->string('file_type')->after('file_path');
            });
        }

        if (! Schema::hasColumn('documentaion_files_tabel', 'created_at')) {
            Schema::table('documentaion_files_tabel', function (Blueprint $table) {
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentaion_files_tabel', function (Blueprint $table) {
            $columns = [];

            foreach (['title', 'file_path', 'file_type', 'created_at', 'updated_at'] as $column) {
                if (Schema::hasColumn('documentaion_files_tabel', $column)) {
                    $columns[] = $column;
                }
            }

            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
