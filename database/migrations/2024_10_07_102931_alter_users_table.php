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
        Schema::table('users', function (Blueprint $table) {
            $table->string('type')->default('customer')->comment('super|admin|client|customer|staff')->nullable()->after('status');
            $table->boolean('verified_at')->default('0')->nullable()->after('status');
            $table->integer('role_id')->nullable()->after('status');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('verified_at');
            $table->dropColumn('role_id');
            $table->dropColumn('deleted_at');
        });
    }
};
