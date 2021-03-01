<?php

use Illuminate\Database\Seeder;
use App\User;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'admin',
            'email' => 'admin@gmail.com',
            'senha' => 'admin',
            'permissao' => 1
        ]);
    }
}
