<?php

use Illuminate\Database\Seeder;

class dosenDum extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	for ($i = 1; $i <= 100; $i++) {
    		DB::table('dosens')->insert([
    				'nip' => '00'.$i,
    				'namadosen' => 'dosen-'.$i,
    		 ]);
    	}
    	
    }
}
