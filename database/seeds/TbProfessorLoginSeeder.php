<?php

use Illuminate\Database\Seeder;

class TbProfessorLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor = app(\App\Models\User::class)->all();
        factory(\App\Models\User::class, 5)->create([
            'pca_id_professor_fk' => $professor->random()->id,
        ]);
    }
}
