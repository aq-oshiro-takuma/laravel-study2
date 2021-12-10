<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
           [
               'name' => 'test01',
               'email' => 'test01@example.com',
               'password' => bcrypt('password'),
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ],
            [
                'name' => 'test02',
                'email' => 'test02@example.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'test03',
                'email' => 'test03@example.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'test04',
                'email' => 'test04@example.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
