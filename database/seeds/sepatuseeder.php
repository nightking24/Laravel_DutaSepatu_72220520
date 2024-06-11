<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class sepatuseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<100;$i++)
        {
        DB::table('sepatu')->insert([
            'jenis' => $faker->word(),
            'merek' => $faker->word(),
            'bahan' => $faker->word(),
            'harga' => $faker->randomnumber(8, true),
            'ukuran' => $faker->randomnumber(3, true),
            'gambar' => $faker->ipv4()
        ]);
    }
}
}
