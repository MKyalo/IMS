<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        User::truncate();
        DB::table('roles')->truncate();

        $adminRole=Role::where('role_name','admin')->first();
        $salesRole=Role::where('role_name','sales')->first();
        $receptionRole=Role::where('role_name','reception')->first();
        $userRole=Role::where('role_name','user')->first();

        $admin=User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'role'=>'admin',
            'password'=>Hash::make('12345678')
        ]);

        $sales=User::create([
            'name'=>'Sales User',
            'email'=>'sales@sales.com',
            'role'=>'sales',
            'password'=>Hash::make('12345678')
        ]);

        $reception=User::create([
            'name'=>'Receptionist User',
            'email'=>'reception@reception.com',
            'role'=>'reception',
            'password'=>Hash::make('12345678')
        ]);

        $user=User::create([
            'name'=>'Normal User',
            'email'=>'user@user.com',
            'role'=>'user',
            'password'=>Hash::make('12345678')
        ]);

        */
    }
}
