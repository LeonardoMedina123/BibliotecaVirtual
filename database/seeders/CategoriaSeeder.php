<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Matemáticas', 'imagen' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=500'],
            ['nombre' => 'Física', 'imagen' => 'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=500'],
            ['nombre' => 'Química', 'imagen' => 'https://images.unsplash.com/photo-1532187863486-abf9d39d6618?w=500'],
            ['nombre' => 'TICs', 'imagen' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500'],
            ['nombre' => 'Electrónica', 'imagen' => 'https://images.unsplash.com/photo-1517055729445-fa7d27394b48?w=500'],
            ['nombre' => 'Eléctrica', 'imagen' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=500'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
