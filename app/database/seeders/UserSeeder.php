<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => User::ADMIN, 'guard_name' => 'web']);
        $apprenantRole = Role::firstOrCreate(['name' => User::APPRENANT, 'guard_name' => 'web']);

        // Create users and assign roles
        User::create([
            'name' => 'apprenant',
            'email' => 'apprenant@solicode.co',
            'password' => Hash::make('apprenant'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($apprenantRole);

        User::create([
            'name' => 'admin',
            'email' => 'admin@solicode.co',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole($adminRole);
    }
}
