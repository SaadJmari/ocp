<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Themes', function(Blueprint $table) {
			$table->foreign('Domaine_id')->references('id')->on('Domaines')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('Themes', function(Blueprint $table) {
			$table->dropForeign('Themes_Domaine_id_foreign');
		});
	}
}