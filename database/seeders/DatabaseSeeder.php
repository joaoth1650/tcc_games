<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * sail artisan migrate --seed
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // foreach (range(1, 10) as $index) {
        //    User::query()->create([
        //        'name' => "dsadsadasdsa",
        //    ]);
        // }

        $this->call([
            RestricaoSeeder::class,
            PopularGamesSeed::class
        ]);
    }
}
