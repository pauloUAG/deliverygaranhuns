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
        \App\Modalidade::create(['nome' => 'Açougue', "icone" => "comida_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Água', "icone" => "agua_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Bar', "icone" => "bar_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Borracharia', "icone" => "carro_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Bomboniere', "icone" => "comida2_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Cabeleireiro', "icone" => "cabeleireiro_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Cafeteria', "icone" => "cafe_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Dedetização', "icone" => "dedetizacao_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Doceria', "icone" => "comida2_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Farmácias', "icone" => "farmacia_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Gás', "icone" => "gas_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Jornal', "icone" => "jornal_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Mercado', "icone" => "mercado_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Padaria', "icone" => "padaria_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Papelaria', "icone" => "papelaria_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Peças Auto', "icone" => "carro_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Pizzaria', "icone" => "pizza_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Quentinha', "icone" => "comida_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Restaurante', "icone" => "comida_logo.svg"]);
        \App\Modalidade::create(['nome' => 'Vestuário', "icone" => "vestuario_logo.svg"]);

    }
}
