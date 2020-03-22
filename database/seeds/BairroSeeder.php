<?php

use Illuminate\Database\Seeder;

class BairroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bairro::create(['nome' => 'Aloísio Souto Pinto']);
        \App\Bairro::create(['nome' => 'Boa Vista']);
        \App\Bairro::create(['nome' => 'Brasília']);
        \App\Bairro::create(['nome' => 'Centro']);
        \App\Bairro::create(['nome' => 'Cohab I']);
        \App\Bairro::create(['nome' => 'Cohab II']);
        \App\Bairro::create(['nome' => 'Cohab III']);
        \App\Bairro::create(['nome' => 'Distrito – São Pedro']);
        \App\Bairro::create(['nome' => 'Distrito – Miracica']);
        \App\Bairro::create(['nome' => 'Distrito – Iratama']);
        \App\Bairro::create(['nome' => 'Dom Hélder Câmara']);
        \App\Bairro::create(['nome' => 'Dom Thiago Postma']);
        \App\Bairro::create(['nome' => 'Francisco Simão dos Santos Figueira']);
        \App\Bairro::create(['nome' => 'Heliópolis']);
        \App\Bairro::create(['nome' => 'Jardim Paulista']);
        \App\Bairro::create(['nome' => 'José Maria Dourado']);
        \App\Bairro::create(['nome' => 'Lacerdópolis']);
        \App\Bairro::create(['nome' => 'Magano']);
        \App\Bairro::create(['nome' => 'Novo Heliópolis']);
        \App\Bairro::create(['nome' => 'Santo Antônio']);
        \App\Bairro::create(['nome' => 'São José']);
        \App\Bairro::create(['nome' => 'Severiano de Moraes Filho']);
        \App\Bairro::create(['nome' => 'Vale do Mandaú']);
        \App\Bairro::create(['nome' => 'Vila Quartel']);


    }
}
