<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        $replies = factory(Reply::class)->times(50)->make()->each(function ($reply, $index) {
            if ($index == 0) {
                // $reply->field = 'value';
            }
        });

        Reply::insert($replies->toArray());
    }

}

