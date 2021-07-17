<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('Grades', function(Blueprint $table) {
			$table->id();
            $table->string('name');
            $table->string('notes')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Grades');
	}
}