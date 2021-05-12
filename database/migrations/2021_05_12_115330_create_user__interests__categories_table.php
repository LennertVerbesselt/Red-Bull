<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInterestsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__interests__categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->boolean('soccer')->default(false);
            $table->boolean('racing')->default(false);
            $table->boolean('winter_sports')->default(false);
            $table->boolean('e_sports')->default(false);
            $table->boolean('cycling')->default(false);
            $table->boolean('dance')->default(false);
            $table->boolean('water_sports')->default(false);
            $table->boolean('skating')->default(false);
            $table->boolean('Entertainment')->default(false);
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
        Schema::dropIfExists('user__interests__categories');
    }
}
