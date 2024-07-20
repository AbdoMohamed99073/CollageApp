<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'AbdoMOhamed',
            'email' => 'examle.com' ,
            'password' => Hash::make('120120'),
        ]);

        DB::table('users')->insert([
            'name' => 'AbdoMOhamed',
            'email' => 'abdo.com' ,
            'password' => Hash::make('120120'),
        ]);
    }
}
