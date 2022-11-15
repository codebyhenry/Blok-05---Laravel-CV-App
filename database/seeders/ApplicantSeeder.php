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
use App\Models\Applicant;
use App\Models\Skill;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // HARD CODED SEEDER.
        DB::table('applicants')->insert([
            'first_name' => 'Tomi',
            'last_name' => 'Ristic',
            'photo' => 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
            'phone' => '0628885263',
            'address' => 'Laan Corpus Den Hoorn 106, 9728 JR Groningen',
            'email' => 'tomi@codegorilla.nl',
            'date_of_birth' => '1993-05-01',
            'nationality' => 'Nederlandse',
            'linkedin_profile' => 'https://www.linkedin.com/in/tomi-ristic-dhevak/'
        ]);

        // SEMI RANDOM DATA. WEL VULLING ZODAT JE OP JE SCHERM IETS KAN ZIEN. NIET HANDIG.
        DB::table('applicants')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'photo' => 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
            'address' => Str::random(10),
            'phone' => Str::random(9),
            'email' => Str::random(10) . '@gmail.com',
            'date_of_birth' => rand(1900, 2020) . '-' . rand(1,12) . '-' . rand(1, 30),
            'nationality' => Str::random(10),
            'linkedin_profile' => 'https://www.' . Str::random(10) . '.nl',
        ]);

        // GEBRUIK VAN FAKER OM ACCURATE DATA TE GENEREREN.

        // MAKE AN INSTANCE OF THE FAKER GENERATOR CLASS.
        $faker = Faker::create();

        // USE FAKER TO GENERATE DATA
        DB::table('applicants')->insert([
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'photo' => $faker->imageUrl(640, 480, 'animals', true),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email(),
            'date_of_birth' => $faker->dateTimeBetween('-30 years', 'now'),
            'nationality' => $faker->country,
            'linkedin_profile' => $faker->url,
        ]);

        // USE YOUR NEWLY CREATED FACTORY TO CREATE DUMMY DATA.
        $applicants = Applicant::factory()->count(5)->create()->each(function ($applicant) {
            // Skill::factory()->count(5)->create()->
        });

    }
}
