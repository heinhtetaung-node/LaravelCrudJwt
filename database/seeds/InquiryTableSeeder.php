<?php

use Illuminate\Database\Seeder;
use App\User;
class InquiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Inquiry::class, 90)->create();
    }
}


	