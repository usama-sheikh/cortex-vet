<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('species')->delete();
        
        \DB::table('species')->insert(array (
            0 => 
            array (
                'id' => 1,
            'name' => 'Canine (Dogs)',
                'added_by' => 1,
                'created_at' => '2024-04-29 14:21:47',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
            'name' => 'Felines (Cats)',
                'added_by' => 1,
                'created_at' => '2024-04-29 14:21:47',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
            'name' => 'Exotic Canine (Dogs)',
                'added_by' => 1,
                'created_at' => '2024-04-29 14:21:47',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
            'name' => 'Exotic Canine (Cats)',
                'added_by' => 1,
                'created_at' => '2024-04-29 14:21:47',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}