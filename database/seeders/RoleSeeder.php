<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Trainee;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Trainee',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'Employee',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $sa = User::create([
            'name' => 'Developer:: Root User',
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
        ]);
        $sa->assignRole('super_admin');

        $t = Trainee::create([
            'name' => 'Trainee:: Public User',
            'email' => 'trainee@role.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
            'type' => 'App\Models\Trainee'
        ]);
        $t->assignRole('Trainee');

        $e = Employee::create([
            'name' => 'Employee:: Public User',
            'email' => 'employee@role.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
            'type' => 'App\Models\Employee'
        ]);
        $e->assignRole('Employee');

        $a = Admin::create([
            'name' => 'Admin:: Public User',
            'email' => 'admin@role.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
            'type' => 'App\Models\Admin'
        ]);
        $a->assignRole('Admin');
    }
}
