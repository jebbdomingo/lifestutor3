<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Generate Users
         */
        // Generate first user for admin role
        DB::table('users')->insert([
            'firstname'     => 'Peter',
            'lastname'      => 'Parker',
            'password'      => bcrypt('pass'),
            'contact_email' => 'spiderman@heroes.com'
        ]);

        // Generate users for member roles
        $em        = app('EntityManager')->getFacadeRoot();
        $generator = \Faker\Factory::create();
        $populator = new Faker\ORM\Doctrine\Populator($generator, $em);
        $populator->addEntity('Services\User\Data\Entities\User\User', 20, array(
          'password' => function() use ($generator) { return bcrypt('pass'); },
          'contact.email' => function() use ($generator) { return $generator->email; }
        ));

        $generatedUsers = $populator->execute();

        /*
         * Generate Roles
         */
        DB::table('roles')->insert([
            [
                'id'   => 1,
                'name' => 'Admin'
            ],
            [
                'id'   => 2,
                'name' => 'Member'
            ]
        ]);

        /*
         * Generate Users' Roles
         */
        // Generate the first user's admin role
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);

        foreach ($generatedUsers['Services\User\Data\Entities\User\User'] as $user) {
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);
        }
    }
}
