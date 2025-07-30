<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Migrations\Migrator;
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
        Schema::create('join_webs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->double('phone', 10,2)->nullable();
            $table->string('password')->nullable();
           $table->enum('sellist1', ['Programming Languages', 'Graphic Designing', 'Cooking', 'Musical Instruments', 'Beauty Salon']);
            $table->enum('sellist2', ['Programming Languages', 'Graphic Designing', 'Cooking', 'Musical Instruments', 'Beauty Salon']);
             
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

class UpdateSellistFields extends Migration
{
       public function up(): void
    {
        DB::statement("ALTER TABLE join_webs MODIFY COLUMN sellist1 ENUM('Programming Languages', 'Graphic Designing', 'Cooking', 'Musical Instruments', 'Beauty Salon', 'Culinary arts')");
        DB::statement("ALTER TABLE join_webs MODIFY COLUMN sellist2 ENUM('Programming Languages', 'Graphic Designing', 'Cooking', 'Musical Instruments', 'Beauty Salon', 'Culinary arts')");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE join_webs MODIFY COLUMN sellist1 ENUM('Cooking')");
        DB::statement("ALTER TABLE join_webs MODIFY COLUMN sellist2 ENUM('Cooking')");
    }
};

