<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria users (UsersTableSeeder)
        $this->call(UsersTableSeeder::class);

        // DB::table('professionals')->insert([
        // 	'name' 		=> 'Raniery Pontes',
        // 	'email'		=> 'pontesraniery@gmail.com',
        // 	'password'	=> Hash::make('123456'),
        // 	'cpf'		=> '05897430403',
        // 	'tel'		=> '83986149858',
        // ]);

        // ************* Seeder Categorias ********** //
        DB::table('categorias')->insert([
            'name'      => 'Moda e Beleza',
            'url'     => 'moda-beleza'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Casa',
            'url'     => 'casa'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Transporte',
            'url'     => 'transporte'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Tecnologia',
            'url'     => 'tecnologia'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Aulas',
            'url'     => 'aulas'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Eventos',
            'url'     => 'eventos'
        ]);

        // ************** Seeder Serviços *********** //

        //*** Serviços (cat. Moda e Beleza)
        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Manicure',
            'url'           => 'manicure'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Cabeleireiro',
            'url'           => 'cabeleireiro'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Depilação',
            'url'           => 'depilacao'
        ]);
        // *************************//

        //*** Serviços (cat. Casa)
        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Pedreiro',
            'url'           => 'pedreiro'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Eletricista',
            'url'           => 'eletricista'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Carpinteiro',
            'url'           => 'carpinteiro'
        ]);
        // *************************//

        //*** Serviços (cat. Transporte)
        DB::table('servicos')->insert([
            'categoria_id'  => 3,
            'name'          => 'Motorista',
            'url'           => 'motorista'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 3,
            'name'          => 'Motoboy',
            'url'           => 'motoboy'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 3,
            'name'          => 'Lavagem Automotiva',
            'url'           => 'lavagem-automotiva'
        ]);
        // *************************//

        // *********** Seeder Especialidades ******** //

        //***** Especialidades (serviço Manicure)
        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Pedicure',
            'url'           => 'pedicure'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Podóloga',
            'url'           => 'podologa'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Unhas Personalizadas',
            'url'           => 'unhas-personalizadas'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Outros',
            'url'           => 'manicure-outros'
        ]);
        // *************************//

        //***** Especialidades (serviço Cabeleleiro)
        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Cortes Masculinos',
            'url'           => 'cortes-masculinos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Cortes Femininos',
            'url'           => 'cortes-femininos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Alisamento',
            'url'           => 'alisamento'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Tintura',
            'url'           => 'tintura'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Escova',
            'url'           => 'escova'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Outros',
            'url'           => 'cabeleireiro-outros'
        ]);
        // *************************//

        //***** Especialidades (serviço Depilação)
        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Cera Quente',
            'url'           => 'cera-quente'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Cera Fria',
            'url'           => 'cera-fria'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Roll On',
            'url'           => 'roll-on'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'À Linha',
            'url'           => 'a-linha'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Outros',
            'url'           => 'depilacao-outros'
        ]);
        // *************************//

        //***** Especialidades (serviço Pedreiro)
        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Telhadista',
            'url'           => 'telhadista'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Porcelanato',
            'url'           => 'porcelanato'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Piso e Alvenaria',
            'url'           => 'piso-alvenaria'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Outros',
            'url'           => 'pedreiro-outros'
        ]);
        // *************************//

        //** Especialidades (serviço Eletricista)
        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Cabeamento',
            'url'           => 'cabeamento'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Fiações Elétricas',
            'url'           => 'fiacoes-eletricas'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Quadros Elétricos',
            'url'           => 'quadros-eletricos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Outros',
            'url'           => 'eletricista-outros'
        ]);
        // *************************//

        //** Especialidades (serviço Carpinteiro)
        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Assoalhos',
            'url'           => 'assoalhos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Forros',
            'url'           => 'forros'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Portas',
            'url'           => 'portas'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Outros',
            'url'           => 'carpinteiro-outros'
        ]);
        // *************************//

        //** Especialidades (serviço Motorista)
        DB::table('especialidades')->insert([
            'servico_id'    => 7,
            'name'          => 'Carro próprio',
            'url'           => 'carro-proprio'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 7,
            'name'          => 'Atendimento 24h',
            'url'           => 'motorista-atend-24'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 7,
            'name'          => 'Outros',
            'url'           => 'morotista-outros'
        ]);
        // *************************//

        //** Especialidades (serviço Motoboy)
        DB::table('especialidades')->insert([
            'servico_id'    => 8,
            'name'          => 'Atendimento 24h',
            'url'           => 'motoboy-atend-24'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 8,
            'name'          => 'Outros',
            'url'           => 'motoboy-outros'
        ]);
        // *************************//

        //** Especialidades (serviço Lavagem Automotiva)
        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Lavagem a seco',
            'url'           => 'lavagem-seco'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Higienização',
            'url'           => 'higienizacao'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Cristalização',
            'url'           => 'cristalizacao'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Outros',
            'url'           => 'lavagem-auto-outros'
        ]);
        // *************************//
    }
}
