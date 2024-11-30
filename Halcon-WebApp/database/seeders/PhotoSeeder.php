<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhotoSeeder extends Seeder
{
    public function run()
    {
        // Insert photos
        DB::table('photos')->insert([
            [
                'order_id' => 1,
                'url' => 'https://th.bing.com/th/id/OIP.lAFPTxcSrutqDo6ejm7oLwHaFc?w=222&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 1,
                'url' => 'https://th.bing.com/th/id/OIP.h2OSga4ZcZNDd4-6gStqSgAAAA?w=246&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 2,
                'url' => 'https://th.bing.com/th/id/OIP.lAFPTxcSrutqDo6ejm7oLwHaFc?w=222&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 2,
                'url' => 'https://th.bing.com/th/id/OIP.h2OSga4ZcZNDd4-6gStqSgAAAA?w=246&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 3,
                'url' => 'https://th.bing.com/th/id/OIP.h2OSga4ZcZNDd4-6gStqSgAAAA?w=246&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 3,
                'url' => 'https://th.bing.com/th/id/OIP.WjdNlwl_VheW5MpT19uCYgHaFj?w=235&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}