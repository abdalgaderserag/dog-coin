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
        $avatars = [
            'default.jpeg',
            'a902d1d3-9692-412a-a2fc-a168a716f8be.png',
            'ariya.jpg',
            'c674bdef-feab-44a7-a40a-71cc66b4af8f.png',
            'freakboy3742.jpg',
            'photo-1527980965255-d3b416303d12.jpeg',
            'yyx990803.jpg',
            'astr.png',
        ];
        for ($j = 0; $j < 8; $j++) {
            $u = factory(App\User::class)->make();
            $u->save();
            $u->avatar = 'images/profile/' . $avatars[$j];
            $u->save();
            $money = factory(App\Money::class)->make();
            $money->user_id = $u->id;
            $money->save();
            for ($i = 0; $i < 8; $i++) {
                $transfer = factory(\App\Transfer::class)->make();
                $transfer->sender_id = $u->id;
                $transfer->recipient_id = random_int(1,8);
                if ($transfer->sender_id !== $transfer->recipient_id)
                    $transfer->save();
            }
        };
    }
}
