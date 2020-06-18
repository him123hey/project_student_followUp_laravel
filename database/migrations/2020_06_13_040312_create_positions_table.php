<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->String('position_name');
            $table->timestamps();
        });
        DB::table('positions')->insert(
            array(
                'position_name' => 'SNA Trainer'
            )
        );
        DB::table('positions')->insert(
            array(
                'position_name' => 'WEP Trainer'
            )
            );
        DB::table('positions')->insert(
            array(
                'position_name' => 'Educator'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
