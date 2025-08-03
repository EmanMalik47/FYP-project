<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::table('join_webs', function (Blueprint $table) {
            $table->string('profile')->nullable(); // 👈 add column here
        });
    }

    public function down()
    {
        Schema::table('join_webs', function (Blueprint $table) {
            $table->dropColumn('profile');
        });
    }
};