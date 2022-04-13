<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::select('SELECT id FROM categories WHERE custom = true');

        UserCategory::factory()
            ->count(count($count))
            ->state(new Sequence(
                function ($sequence) use ($count) {
                    return ['category_id' => $count[$sequence->index]->id];
                }
            ))
            ->create();
    }
}
