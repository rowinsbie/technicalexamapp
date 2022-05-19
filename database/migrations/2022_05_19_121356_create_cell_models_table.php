<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateCellModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cell_model', function (Blueprint $table) {
            $table->id();
            $table->integer('max_row');
            $table->integer('max_column');
            $table->timestamps();
        });

        DB::table('cell_model')->insert([
            [
                'max_row'=>12,
                'max_column'=>12
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cell_model');
    }
}
