<?php

use Illuminate\Database\Seeder;
use App\Recordatori;
use Illuminate\Support\Facades\DB;

class RecordatoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recordatori::class, 29)->create();
    }
}
