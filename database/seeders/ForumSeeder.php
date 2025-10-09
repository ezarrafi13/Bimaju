<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Thread;
use App\Models\Tag;
use Illuminate\Support\Str;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        // ====== 1. Buat User Dummy ======
        $user1 = User::firstOrCreate(
            ['email' => 'wulandari@example.com'],
            ['name' => 'Wulandari', 'password' => bcrypt('password')]
        );

        $user2 = User::firstOrCreate(
            ['email' => 'budi@example.com'],
            ['name' => 'Budi Santoso', 'password' => bcrypt('password')]
        );

        $user3 = User::firstOrCreate(
            ['email' => 'andi@example.com'],
            ['name' => 'Chef Andi', 'password' => bcrypt('password')]
        );

        // ====== 2. Buat Tag ======
        $marketing = Tag::firstOrCreate(['name' => 'Marketing'], ['slug' => Str::slug('Marketing')]);
        $digital   = Tag::firstOrCreate(['name' => 'Digital'], ['slug' => Str::slug('Digital')]);
        $pemula    = Tag::firstOrCreate(['name' => 'Pemula'], ['slug' => Str::slug('Pemula')]);

        $finance   = Tag::firstOrCreate(['name' => 'Finance'], ['slug' => Str::slug('Finance')]);
        $hpp       = Tag::firstOrCreate(['name' => 'HPP'], ['slug' => Str::slug('HPP')]);
        $pricing   = Tag::firstOrCreate(['name' => 'Pricing'], ['slug' => Str::slug('Pricing')]);

        $recipes   = Tag::firstOrCreate(['name' => 'Recipes'], ['slug' => Str::slug('Recipes')]);
        $ayam      = Tag::firstOrCreate(['name' => 'Ayam'], ['slug' => Str::slug('Ayam')]);
        $bestseller= Tag::firstOrCreate(['name' => 'Bestseller'], ['slug' => Str::slug('Bestseller')]);

        // ====== 3. Buat Threads ======
        $thread1 = Thread::create([
            'title'          => 'Tips Pemasaran Digital untuk UMKM F&B Pemula',
            'content'        => 'Halo teman-teman! Saya baru memulai usaha warung makan kecil ...',
            'user_id'        => $user1->id,
            'replies_count'  => 12,
            'last_activity'  => now()->subHours(2),
            'created_at'     => now()->subDay(),
        ]);
        $thread1->tags()->attach([$marketing->id, $digital->id, $pemula->id]);

        $thread2 = Thread::create([
            'title'          => 'Cara Menghitung HPP yang Tepat untuk Makanan',
            'content'        => 'Mohon bantuan untuk menghitung HPP makanan ...',
            'user_id'        => $user2->id,
            'replies_count'  => 8,
            'last_activity'  => now()->subHours(4),
            'created_at'     => now()->subDays(2),
        ]);
        $thread2->tags()->attach([$finance->id, $hpp->id, $pricing->id]);

        $thread3 = Thread::create([
            'title'          => 'Resep Ayam Geprek yang Laris Manis',
            'content'        => 'Sharing resep ayam geprek yang sudah terbukti laku keras ...',
            'user_id'        => $user3->id,
            'replies_count'  => 25,
            'last_activity'  => now()->subHour(),
            'created_at'     => now()->subDays(3),
        ]);
        $thread3->tags()->attach([$recipes->id, $ayam->id, $bestseller->id]);
    }
}
