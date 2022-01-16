<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class AttributeValueTableSeeder extends Seeder
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
                'attribute_value' => 'red',
                'attribute_id' => 1
            ],
            [
                'attribute_value' => 'green',
                'attribute_id' => 1
            ],
            [
                'attribute_value' => 'purple',
                'attribute_id' => 1
            ],

            ['attribute_value' => 's',
                'attribute_id' => 2
            ],
            ['attribute_value' => 'm',
                'attribute_id' => 2
            ]

        ];

        foreach ($data as $attribute) {
            AttributeValue::create($attribute);
        }
    }
}
