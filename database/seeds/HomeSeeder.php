<?php

use Illuminate\Database\Seeder;
use App\Home;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = factory(Home::class)->create([
            'name' => 'Casa 1',
        ]);

        $home = factory(Home::class)->create([
            'name' => 'Casa 2',
        ]);

        $home = factory(Home::class)->create([
            'name' => 'Casa 3',
        ]);
    }
}
