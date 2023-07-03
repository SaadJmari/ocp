<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThemesTable extends Migration {

	public function up()
	{
		Schema::create('Themes', function(Blueprint $table) {
			$table->id();
			$table->string('Name_Theme');
			$table->string('Description_Theme');
			$table->bigInteger('Domaine_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Themes');
	}
}
