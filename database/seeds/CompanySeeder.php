<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Company::class, 50)->create()
                                        ->each(function (\App\Company $company) {
                                            $company->receptions()->createMany(factory(\App\Reception::class,
                                                rand(1, 5))->make()->toArray());
                                        });
    }
}
