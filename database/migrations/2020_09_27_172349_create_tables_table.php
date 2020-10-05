<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });  

        DB::table('tables')->insert(array(
            ["id" => '1'],
            ["id" => '2'],
            ["id" => '3'],
            ["id" => '4'],
            ["id" => '5'],
            ["id" => '6'],
            ["id" => '7'],
            ["id" => '8'],
            ["id" => '9'],
            ["id" => '10'],
        ));
                    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
