<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        DB::table("paises")->insert([
            [
                "id"         => 1,
                "descricao"  => "Argentina",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id"         => 2,
                "descricao"  => "Brasil",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id"         => 3,
                "descricao"  => "Espanha",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id"         => 4,
                "descricao"  => "Portugal",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
