<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // criar um registro a partir da instância do objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site ='fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // criar um registro com o método create (precisa do fillable no Model)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.comb.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        // insert (não passa pelo tratamento do eloquent e não insere dados nos campos timestamps)
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.comb.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
