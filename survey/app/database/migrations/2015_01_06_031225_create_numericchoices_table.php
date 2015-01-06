<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumericchoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('numericchoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeric_description', 100);
            $table->integer('question_id');
            $table->integer('numeric_value');
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
        Schema::drop('numericchoices');
    }


}
