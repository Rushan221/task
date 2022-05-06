<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'category_id' => 1,
                'title' => 'Company1',
            ],
            [
                'category_id' => 2,
                'title' => 'Company2',
            ],
            [
                'category_id' => 3,
                'title' => 'Company3',
            ],
            [
                'category_id' => 4,
                'title' => 'Company4',
            ],
            [
                'category_id' => 5,
                'title' => 'Company5',
            ],
            [
                'category_id' => 6,
                'title' => 'Company6',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
