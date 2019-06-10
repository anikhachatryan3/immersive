<?php

use Illuminate\Database\Seeder;

class HatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Hat::class, 100)->create();
    }
}
