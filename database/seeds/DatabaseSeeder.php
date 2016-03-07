<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ArtistsTableSeeder');

        $this->command->info('Artists table seeded with 150 fake artists!');
    }
}

class ArtistsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('artists')->delete();

        $faker = Faker::create();
        foreach (range(1,150) as $index) {
            DB::table('artists')->insert([
                'naamartiestband' => $faker->name,
                'biografie' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'persfoto1' => $faker->imageUrl(800, 600, 'cats'),
                'persfoto2' => $faker->imageUrl(800, 600, 'cats'),
                'persfoto3' => $faker->imageUrl(800, 600, 'cats'),
                'website' => $faker->domainName,
                'youtube' => $faker->domainName,
                'facebook' => 'http://www.facebook.com/' . $faker->firstName(),
                'twitter' => 'http://www.twitter.com/' . $faker->firstName(),
                'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            ]);
        }
    }

}
