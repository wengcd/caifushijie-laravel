<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			$table->string('remember_token', 100);
			$table->boolean('is_admin');
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
//		Schema::table('cats', function($table){
//			$table->integer('user_id')->nullable()->references('id')->on('users');
//		});
	}

}
