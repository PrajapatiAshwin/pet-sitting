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
        Schema::create('plan_management', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('plan_name');
            $table->decimal('amount', 8, 2);
            $table->enum('duration', ['month', 'year'])->default('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_management');
    }
};
