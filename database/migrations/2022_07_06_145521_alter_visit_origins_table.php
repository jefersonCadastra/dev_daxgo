<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVisitOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visit_origins', function (Blueprint $table) {
            $table->enum('paid', ['S', 'N'])->comment('S - Sim (Patrocinada) | N - Não (Orgânica)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_origins', function (Blueprint $table) {
            $table->dropColumn('paid');
        });
    }
}
