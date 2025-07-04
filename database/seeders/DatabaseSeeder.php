<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UsersTableSeeder::class,
           ExpertsTableSeeder::class,
           PenyakitsTableSeeder::class,
           GejalasTableSeeder::class,
           SolusisTableSeeder::class,
           RulesTableSeeder::class,
        ]);
        
        
    }
}
