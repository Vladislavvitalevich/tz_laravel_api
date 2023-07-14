<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ukraineCities = [
            'Kiev',
            'Kharkiv',
            'Dnipro',
            'Odesa',
            'Lviv',
            'Zaporizhia',
            'Kryvyi Rih',
            'Mykolaiv',
            'Mariupol',
            'Luhansk',
            'Vinnytsia',
            'Simferopol',
            'Kherson',
            'Poltava',
            'Chernihiv',
            'Cherkasy',
            'Zhytomyr',
            'Sumy',
            'Rivne',
            'Ternopil',
            'Ivano-Frankivsk',
            'Kamianske',
            'Kremenchuk',
            'Lutsk',
            'Melitopol',
            'Bila Tserkva',
            'Kerch',
            'Nikopol',
            'Berdiansk',
            'Sloviansk',
            'Sevastopol',
            'Alchevsk',
            'Pavlohrad',
            'Uzhhorod',
            'Yevpatoriia',
            'Makiivka',
            'Yenakiieve',
            'Kamianets-Podilskyi',
            'Krasnyi Luch',
            'Hvardiiske',
            'Kolomyia',
            'Kostiantynivka',
            'Brovary',
            'Uman',
            'Boryspil',
            'Illichivsk',
            'Sievierodonetsk',
            'Lysychansk',
            'Mukachevo',
            'Yalta',
            'Kovel',
            'Drohobych',
            'Nizhyn',
        ];

        DB::table('cities')->insert(
            array_map(function ($city) {
                return ['name' => $city];
            }, $ukraineCities)
        );
    }
}
