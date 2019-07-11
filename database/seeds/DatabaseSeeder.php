<?php

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
        factory(App\User::class, 5)->create()->each(function ($u) {
            $money = factory(App\Money::class)->make();
            $money->user_id = $u->id;
            $money->save();
        });
    }
}
