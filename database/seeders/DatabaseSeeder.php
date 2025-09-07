<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin MRATANI',
            'email' => 'admin@mratani.com',
            'password' => Hash::make('password123'),
        ]);

        // Create sample products
        Product::create([
            'name' => 'Cabe Rawit Merah',
            'description' => 'Varietas unggulan dengan tingkat kepedasan tinggi dan hasil panen melimpah. Cocok untuk berbagai jenis masakan tradisional Indonesia.',
            'image' => 'assets/cabe-rawit-merah.png',
            'category' => 'Varietas Premium',
            'features' => ['Pedas Tinggi', 'Hasil Melimpah'],
            'is_featured' => true,
            'sort_order' => 1
        ]);

        Product::create([
            'name' => 'Cabe Hijau Ceplus',
            'description' => 'Cabai hijau dengan rasa segar dan tekstur renyah. Ideal untuk lalapan dan berbagai olahan sayuran segar.',
            'image' => 'assets/cabai-hijau.png',
            'category' => 'Varietas Segar',
            'features' => ['Segar', 'Sehat'],
            'is_featured' => true,
            'sort_order' => 2
        ]);

        Product::create([
            'name' => 'Cabe Rawit Lokal',
            'description' => 'Varietas lokal yang telah beradaptasi dengan iklim Indonesia. Tahan penyakit dan mudah dibudidayakan.',
            'image' => 'assets/cabe-rawit.png',
            'category' => 'Varietas Adaptif',
            'features' => ['Tahan Penyakit', 'Mudah Tanam'],
            'is_featured' => true,
            'sort_order' => 3
        ]);

        // Create sample articles
        Article::create([
            'title' => 'Persiapan Lahan',
            'content' => 'Pastikan lahan memiliki drainase yang baik dan pH tanah antara 6,0-7,0. Gemburkan tanah hingga kedalaman 20-30 cm dan campurkan dengan kompos atau pupuk kandang yang telah matang.',
            'excerpt' => 'Panduan lengkap persiapan lahan untuk budidaya cabai yang optimal.',
            'is_published' => true,
            'sort_order' => 1
        ]);

        Article::create([
            'title' => 'Teknik Penyemaian',
            'content' => 'Rendam benih dalam air hangat selama 2-3 jam sebelum disemai. Gunakan media semai berupa campuran tanah, kompos, dan sekam bakar dengan perbandingan 1:1:1.',
            'excerpt' => 'Tips dan trik penyemaian benih cabai untuk hasil terbaik.',
            'is_published' => true,
            'sort_order' => 2
        ]);

        Article::create([
            'title' => 'Perawatan Rutin',
            'content' => 'Lakukan penyiraman secara teratur, terutama pada pagi dan sore hari. Berikan pupuk NPK sesuai dosis anjuran setiap 2 minggu sekali dan pantau dari serangan hama.',
            'excerpt' => 'Panduan perawatan harian untuk tanaman cabai yang sehat.',
            'is_published' => true,
            'sort_order' => 3
        ]);
    }
}
