<?php

use Illuminate\Database\Seeder;
use App\Model\Employed;
class EmployedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employed::create([
            'name' => 'João da Silva',            
        ]);
    }
}
