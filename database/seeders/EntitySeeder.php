<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = DB::select('SELECT id FROM users');

        Entity::factory()
            ->count(50)
            ->state(new Sequence(
                function ($sequence) use ($users) {
                    return ['user_id' => $users[$sequence->index%count($users)]->id];
                }
            ))
            ->create();
    }
}
