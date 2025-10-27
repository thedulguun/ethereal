<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable()->after('name');
            }

            if (! Schema::hasColumn('users', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('username');
            }

            if (! Schema::hasColumn('users', 'home_address')) {
                $table->string('home_address')->nullable()->after('date_of_birth');
            }

            if (! Schema::hasColumn('users', 'profile_photo_path')) {
                $table->string('profile_photo_path')->nullable()->after('home_address');
            }

            if (! Schema::hasColumn('users', 'profile_details_updated_at')) {
                $table->timestamp('profile_details_updated_at')->nullable()->after('profile_photo_path');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columnsToDrop = array_filter(
                ['profile_details_updated_at', 'home_address', 'date_of_birth', 'username', 'profile_photo_path'],
                fn (string $column) => Schema::hasColumn('users', $column)
            );

            if (! empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
