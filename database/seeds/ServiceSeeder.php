<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Демонтаж',
            'Вывоз',
            'Прием на переработку',
            'Прием',
            'Снос зданий и сооружений',
            'Утилизация автомобилей и спецтехники',
            'Погрузчик',
            'Цветной металл',
            'Черный металл',
            'Бытовой металл',
            'Нержавейка',
            'Стружка',
            'Кабель',
            'Свинец',
            'Бумага',
            'Полиэтилен',
            'Пленка ПВХ',
            'Пластмасса',
            'Поликарбонат',
            'ПЭТ',
        ];

        foreach ($services as $service){
            factory(\App\Service::class)->create(['name' => $service]);
        }
    }
}
