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
        Schema::create('join_webs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->double('phone', 10,2)->nullable();
            $table->string('password')->nullable();
           $table->enum('sellist1', ['Culinary arts', 'Knife skills', 'Chines cusine', 'Italian food', 'Sea food']);
            $table->enum('sellist2', ['Culinary arts', 'Knife skills', 'Chines cusine', 'Italian food', 'Sea food']);
             
               $table->string('facilities')->nullable();
                $table->string('about')->nullable();

            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('join_webs');
    }
};
