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
        $companies = factory(\App\Company::class, 50)->create();

        $companies->each(function (\App\Company $company) {
            $company->users()->saveMany(
                factory(\App\User::class, rand(1, 5))
                    ->create()
                    ->each(function (\App\User $user) {
                        $user->profile()->save(
                            factory(\App\Profile::class)->create()
                        );
                    })
            );
            $company->place()->save(create(App\Place::class));
            $company->receptions()->saveMany(
                create(\App\Reception::class, [], rand(1, 10))
            )->each(function (\App\Reception $reception) {
                $reception->place()->save(create(\App\Place::class));
                $reception->users()->saveMany(
                    create(\App\User::class, [], rand(1, 5))
                        ->each(function (\App\User $user) {
                            $user->profile()->save(
                                factory(\App\Profile::class)->create()
                            );
                        })
                );
                $reception->services()->saveMany(
                    \App\Service::query()->inRandomOrder()->take(rand(1,5))->get()
                );
                $reception->reviews()->saveMany(
                    factory(\App\Review::class, rand(1,5))->create()
                );
            });
            $company->reviews()->saveMany(
                factory(\App\Review::class, rand(1, 20))
                    ->create()
            );
        });
    }
}
