<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'telefone samsumg',
            'sku' => 'tel-samg',
            'quantidade' => '10',
            'valor' => '10.7',
            'descricao' => 'teste teste',
            'status' => 'A',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
