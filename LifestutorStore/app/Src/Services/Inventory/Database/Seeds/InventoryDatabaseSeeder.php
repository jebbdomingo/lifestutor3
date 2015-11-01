<?php
namespace App\Src\Services\Inventory\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InventoryDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('App\Src\Services\Inventory\Database\Seeds\FoobarTableSeeder');
	}

}
