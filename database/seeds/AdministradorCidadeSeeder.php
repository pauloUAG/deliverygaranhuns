<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministradorCidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AdminCidade::create([
            'name' => 'AdminGaranhuns',
            'email' => 'adminCidade@gmail.com',
            'password' => Hash::make('admin'),
            'cidade_id' => '1'
        ]);
        \App\AdminCidade::create([
            'name' => 'AdminTerezinha',
            'email' => 'adminTerezinha@gmail.com',
            'password' => Hash::make('admin'),
            'cidade_id' => '2'
        ]);
    }
}
