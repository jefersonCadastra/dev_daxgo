<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->decimal('average_price')->unsigned()->default(0);
            $table->decimal('percentage_goal')->unsigned()->default(0);
            $table->decimal('price_goal')->unsigned()->default(0);
            $table->decimal('price_u')->unsigned()->default(0);
            $table->tinyInteger('month')->unsigned()->default(0);
            $table->smallInteger('year')->unsigned()->default(0);
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
        Schema::dropIfExists('product_goals');
    }
}
