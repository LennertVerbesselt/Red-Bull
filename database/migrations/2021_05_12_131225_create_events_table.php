<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
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
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->string('location');
            $table->datetime('datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('total_tickets_available');
            $table->integer('tickets_sold');
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
}
