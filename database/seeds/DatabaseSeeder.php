<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $rol = Role::create(['name' => 'admin']);
        
        User::create([
             'name' => 'Daniel Casale',
             'email' => 'casale.candoit@gmail.com',
             'password' => 'secret',
             'role_id' => $rol->id,
             'remember_token' => str_random(10)]);
    }
}
