<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// FAKER
use Faker\Factory as Faker;
// use Faker\Provider\en_US\Person;
use Faker\Provider\en_US\Address;
use Faker\Provider\en_US\PhoneNumber;
use Faker\Provider\Internet;
use Faker\Provider\DateTime;

// FACTORY
use App\Models\Person;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // HARD CODED SEEDER.
        DB::table('persons')->insert([
            'first_name' => 'Tomi',
            'last_name' => 'Ristic',
            'phone' => '0628885263',
            'address' => 'Laan Corpus Den Hoorn 106, 9728 JR Groningen',
            'email' => 'tomi@codegorilla.nl',
            'date_of_birth' => '01-05-1993',
            'nationality' => 'Nederlandse',
            'linkedin_profile' => 'https://www.linkedin.com/in/tomi-ristic-dhevak/'
        ]);

        // SEMI RANDOM DATA. WEL VULLING ZODAT JE OP JE SCHERM IETS KAN ZIEN. NIET HANDIG.
        DB::table('persons')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'address' => Str::random(10),
            'phone' => Str::random(9),
            'email' => Str::random(10) . '@gmail.com',
            'date_of_birth' => rand(0,30) . '-' . rand(1,50) . '-' . rand(1900, 2022),
            'nationality' => Str::random(10),
            'linkedin_profile' => 'https://www.' . Str::random(10) . '.nl',
        ]);

        // GEBRUIK VAN FAKER OM ACCURATE DATA TE GENEREREN.

        // MAKE AN INSTANCE OF THE FAKER GENERATOR CLASS.
        $faker = Faker::create();

        // USE FAKER TO GENERATE DATA
        DB::table('persons')->insert([
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email(),
            'date_of_birth' => $faker->dateTimeBetween('-30 years', 'now'),
            'nationality' => $faker->country,
            'linkedin_profile' => $faker->url,
        ]);

        // USE YOUR NEWLY CREATED FACTORY TO CREATE DUMMY DATA.
        $persons = Person::factory()->count(20)->create();

    }
}
