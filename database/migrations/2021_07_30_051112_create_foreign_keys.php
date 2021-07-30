<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('Grades')
						->onDelete('cascade');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->foreign('class_id')->references('id')->on('Classrooms')
						->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('Classrooms_grade_id_foreign');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_grade_id_foreign');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_class_id_foreign');
		});
	}
}