<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('join_webs', function (Blueprint $table) {
        $table->boolean('learner_completed')->default(false);
        $table->boolean('teacher_completed')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('join_webs', function (Blueprint $table) {
             $table->dropColumn(['learner_completed', 'teacher_completed']);
        });
    }
};
