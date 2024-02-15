<?php

namespace Database\Seeders;

use App\Models\PlanFeatue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            'E-Rekam Medis (Diagnosa ICD 10)',
            'Dashboard Monitoring',
            'Registrasi Pasien dan Antrean',
            'Manajemen Tarif, Obat, dan BHP',
            'Manajemen Poliklinik',
            'Manajemen Komisi',
            'Pengaturan Multiuser',
            'Manajemen Stok',
            'Resep Digital',
            'Manajemen Farmasi',
            'Surat Administratif (Persetujuan Tindakan dan surat lainnya)',
            'Bridging BPJS',
            'Integrasi Satu Sehat'
        ];

        for ($i = 0; $i < count($data); $i++) {
            PlanFeatue::create([
                'name' => $data[$i],
            ]);
        }


    }
}
