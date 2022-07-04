<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_id')->constrained();
            $table->integer('quantity')->unsigned()->default(0);
            $table->smallInteger('origin')->unsigned()->default(0);
            $table->enum('paid', ['S', 'N'])->comment('S - Sim (Patrocinada) | N - Não (Orgânica)');
            $table->decimal('cpc')->unsigned()->default(0);
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
        Schema::dropIfExists('visit_details');
    }
}
