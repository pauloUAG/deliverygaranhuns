<?php

use Illuminate\Database\Seeder;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modalidade::create(['nome' => 'Açougue']);
        \App\Modalidade::create(['nome' => 'Água e Gás']);
        \App\Modalidade::create(['nome' => 'Banca de jornal']);
        \App\Modalidade::create(['nome' => 'Borracharia']);
        \App\Modalidade::create(['nome' => 'Cabeleireiro / Barbearia / Salão de beleza']);
        \App\Modalidade::create(['nome' => 'Dedetização']);
        \App\Modalidade::create(['nome' => 'Drogaria / Farmácia']);
        \App\Modalidade::create(['nome' => 'Lanchonete / Doceria / Cafeteria / Bomboniere']);
        \App\Modalidade::create(['nome' => 'Material de construção']);
        \App\Modalidade::create(['nome' => 'Mercadinho / Mercearia']);
        \App\Modalidade::create(['nome' => 'Padaria']);
        \App\Modalidade::create(['nome' => 'Papelaria']);
        \App\Modalidade::create(['nome' => 'Peças automotivas']);
        \App\Modalidade::create(['nome' => 'Pet shop']);
        \App\Modalidade::create(['nome' => 'Restaurante / Pizzaria / Quentinha / Bar']);

    }
}
