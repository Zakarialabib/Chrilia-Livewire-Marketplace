<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subscription;

class SubscriptionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptionIds = Subscription::pluck('id');
        
        $vendorSubscriptions = [];
        $clientSubscriptions = [];
        
        foreach ($subscriptionIds as $id) {
            $vendorSubscriptions[$id] = ['price' => 10];
            $clientSubscriptions[$id] = ['price' => 15];
        }
        
        User::findOrFail(3)->subscriptions()->sync($vendorSubscriptions);
        User::findOrFail(4)->subscriptions()->sync($vendorSubscriptions);
        User::findOrFail(5)->subscriptions()->sync($clientSubscriptions);
        User::findOrFail(6)->subscriptions()->sync($clientSubscriptions);
        
       
    }
}
