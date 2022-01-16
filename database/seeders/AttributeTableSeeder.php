<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'attribute_name' => 'color'
            ],
            [
                'attribute_name' => 'size'
            ],
        ];

        foreach ($data as $attribute) {
            Attribute::create($attribute);
        }

    }
}
