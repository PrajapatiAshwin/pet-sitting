<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->string('contact_number')->after('email'); 
            $table->string('pet_name')->after('contact_number');
            $table->string('pet_type')->after('pet_name');
            $table->text('pet_description')->nullable()->after('pet_type');
            $table->string('pet_photo')->nullable()->after('pet_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn([
                'contact_number',
                'pet_name',
                'pet_type',
                'pet_description',
                'pet_photo'
            ]);
        });
    }
};
