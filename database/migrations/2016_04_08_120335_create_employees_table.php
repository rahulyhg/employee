<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'employees', function ( Blueprint $table ) {
			$table->increments( 'id' );

			$table->string( 'name' );
			$table->string( 'email' )->unique();
			$table->string( 'photo' )->default( null );
			$table->string( 'phone' );
			$table->string( 'job' );
			$table->integer( 'department_id' );
			$table->integer( 'avatar_id' )->default( 0 );

			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'employees' );
	}
}
