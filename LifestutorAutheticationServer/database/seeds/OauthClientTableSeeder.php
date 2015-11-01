<?php

use Illuminate\Database\Seeder;

class OauthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'id'     => 1,
            'secret' => 'secret',
            'name'   => 'store',
        ]);
    }
}
