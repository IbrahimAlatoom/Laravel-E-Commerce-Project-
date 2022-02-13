<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\Db;
use Illuminate\support\Facades\Hash;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert(
            [
                 [
                    'name'=>'Oppo Mobile',
                    'price'=>'140',
                    'category'=>'mobile',
                    'description'=>'Smart phone with high ',
                    'gallery' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhXZoiHsCIik35nOnPH5CZLYvNQmsCC5bGXQ&usqp=CAU'
                 ],
                 [
                    'name'=>'Sony TV',
                    'price'=>'790',
                    'category'=>'TV',
                    'description'=>'Smart TV 4k ',
                    'gallery' => 'https://www.notebookcheck.net/fileadmin/Notebooks/News/_nc3/Untitled6885.png'
                 ],
            ]
        );

    }
}
