<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roles = Role::all();

        foreach ($roles as $role) {
            if($role->id == Role::ROLE_STUDENT){
                continue;
            }
            User::create([
                'name' => $role->name . ' User',
                'email' => strtolower(str_replace(' ', '_', $role->name)) . '@example.com',
                'password' => Hash::make('password'),
                'type' => $role->name === 'Super Admin' ? 'admin' : 'user',
                'role_id' => $role->id,
            ]);
        }
    }
}
