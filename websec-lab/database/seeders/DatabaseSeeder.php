<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Comment::query()->delete();
        DB::table('sessions')->delete();
        User::query()->delete();

        foreach (
            [
                ['name' => 'alice', 'email' => 'alice@example.local', 'password' => 'password'],
                ['name' => 'bob', 'email' => 'bob@example.local', 'password' => 'bob123'],
                ['name' => 'admin', 'email' => 'admin@example.local', 'password' => 'admin'],
            ] as $row
        ) {
            User::query()->create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
            ]);
        }
    }
}
