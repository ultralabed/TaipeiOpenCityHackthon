<?php

use Illuminate\Database\Seeder;

class ItemlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Itemlist::class,10)->create();
    }
}
