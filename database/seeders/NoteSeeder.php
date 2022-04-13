<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::select('SELECT id FROM categories WHERE custom = false');
        $users = DB::select('SELECT id FROM users');

        Note::factory()
            ->count(100)
            ->state(new Sequence(
                function () use ($categories, $users) {
                    return [
                        'category_id' => $categories[rand(0, count($categories)-1)]->id,
                        'user_id' => $users[rand(0, count($users)-1)]->id,
                    ];
                }
            ))
            ->create();
    }
}
