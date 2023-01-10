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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('detail')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->decimal('cost')->nullable();
            $table->text('cost_detail')->nullable();
            $table->integer('max')->nullable();
            $table->integer('current')->default(0)->nullable();
            $table->boolean('display')->default(1);
            $table->text('contact_name')->nullable();
            $table->text('contact_phone')->nullable();
            $table->text('contact_eamil')->nullable();
            $table->boolean('has_registration')->default(0);
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('events');
    }
};
