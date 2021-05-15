<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile__statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->integer('followers')->default(0);
            $table->integer('following')->default(0);
            $table->integer('amount_of_posts')->default(0);
            $table->integer('total_cans_scanned')->default(0);
            $table->datetime('last_can_scanned')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('profile__statistics');
    }
}
