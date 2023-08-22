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
        Schema::create('post_offices', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('commune_id')->unsigned();
            $table->string('commune_name');
            $table->string('commune_name_ascii');

            $table->string('daira_name');
            $table->string('daira_name_ascii');
            
            $table->tinyInteger('wilaya_code')->unsigned();
            $table->string('wilaya_name');
            $table->string('wilaya_name_ascii');
            
            $table->smallInteger('post_code')->unsigned()->nullable();
            $table->string('post_name');
            $table->string('post_name_ascii');
            $table->string('post_address');
            $table->string('post_address_ascii');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
