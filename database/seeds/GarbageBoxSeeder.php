<?php

use Illuminate\Database\Seeder;
use App\Garbagebox;

class GarbageBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__.'/garbageboxes.json';
        $results = json_decode(File::get($path));
        foreach($results as $result){
            $garbagebox = new Garbagebox;
            $garbagebox->area = $result->area;
            $garbagebox->road = $result->road;
            $garbagebox->note = $result->note;
            $garbagebox->lon = $result->lon;
            $garbagebox->lat = $result->lat;
            $garbagebox->save();
        }
    }
}
