<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Education']);
        DB::table('categories')->insert([
            'name' => 'Automotive']);
        DB::table('categories')->insert([
            'name' => 'Transport']);
        DB::table('categories')->insert([
            'name' => 'Information technology']);
        DB::table('categories')->insert([
            'name' => 'Artificial Intelligence']);
        DB::table('categories')->insert([
            'name' => 'Services']);
    }
}
