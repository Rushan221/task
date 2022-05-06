<?php

namespace Database\Seeders;

use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Company1', 'Company2', 'Company3', 'Company4', 'Company5', 'Company6', 'Company7', 'Company8'];

        foreach ($categories as $category) {
            CompanyCategory::create([
                'title' => $category
            ]);
        }
    }
}
