<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //CALL A SINGLE SEEDER FILE.
        $this->call(PersonSeeder::class);

        // CALLING MULTIPLE SEEDER CLASSES.
        // $this->call([
        //     PersonSeeder::class,
        //     JobsSeeder::class,
        //     EducationSeeder::class,
        //     LanguageSeeder::class
        // ]);
    }
}
