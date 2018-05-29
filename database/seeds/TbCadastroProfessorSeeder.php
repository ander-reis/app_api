<?php

use Illuminate\Database\Seeder;

class TbCadastroProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 1)->create([
            'name' => 'Anderson',
            'email' => 'admin@user.com',
            'password' => bcrypt('secret'),
            'ds_cpf' => '278.193.468-25'
        ]);

        factory(\App\Models\User::class, 1)->create([
            'name' => 'Anderson',
            'email' => 'anderson@sinprosp.org.br',
            'password' => bcrypt('secret'),
            'ds_cpf' => '485.721.320-66'
        ]);

        factory(\App\Models\User::class, 5)->create();
    }
}
