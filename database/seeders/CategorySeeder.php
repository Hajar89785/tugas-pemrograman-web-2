<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Furniture',
        'code'=>'FURN',
        'description'=>'Berbagai macam meja kantor, kursi kerja, dan lemari arsip.'        
        ]);

        Category::create(['name'=>'Elektronik',
        'code'=>'ELEC',
        'description'=>'Peralatan elektronik pendukung kerja seperti laptop dan printer.'        
        ]);


        Category::create(['name'=>'Alat Tulis Kantor',
        'code'=>'ATK',
        'description'=>'Kebutuhan tulis-menulis dan administrasi harian.'        
        ]);

        Category::create(['name'=>'Alat Kebersihan',
        'code'=>'CLN',
        'description'=>'Perlengkapan untuk menjaga kebersihan area gudang dan kantor'        
        ]);
    }
}
