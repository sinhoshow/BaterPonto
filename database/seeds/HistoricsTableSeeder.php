<?php

use Illuminate\Database\Seeder;
use App\Model\Historic;

class HistoricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = date("Y-m-d H:i:s");
        Historic::create([
            'user_id' => 1,
            'type' => 'In',
            'data'=> $data,
        ]);
        $data = date("Y-m-d H:i:s");
        Historic::create([
            'user_id' => 1,
            'type' => 'Out',
            'data'=> $data,
        ]);
        Historic::create([
            'user_id' => 1,
            'type' => 'In',
            'data'=> '2018-08-31 08:25:36',
        ]);
        Historic::create([
            'user_id' => 1,
            'type' => 'In',
            'data'=> '2018-08-27 08:23:36',
        ]); 
        Historic::create([
            'user_id' => 1,
            'type' => 'In',
            'data'=> '2018-08-02 08:40:36',
        ]); 
        Historic::create([
            'user_id' => 1,
            'type' => 'In',
            'data'=> '2017-08-31 08:17:36',
        ]);         
    }
}
