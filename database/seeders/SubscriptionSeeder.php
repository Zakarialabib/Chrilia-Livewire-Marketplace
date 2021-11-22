<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'name'           => 'Monthly',
                'details'          => 'some description',
            ],
            [
                'name'           => 'Yearly',
                'details'          => 'some description',
            ],
        ];

        Subscription::insert($subscriptions);
    }
}
