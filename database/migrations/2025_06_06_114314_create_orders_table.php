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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message')->nullable();

            $table->unsignedBigInteger('plan_id')->nullable();
            $table->string('plan_name')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->text('features')->nullable();
            $table->foreign('plan_id')->references('id')->on('plan_management')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
