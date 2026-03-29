<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@dwiarthaprima.com'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Sample services
        $services = [
            ['name' => 'Construction Services', 'description' => 'Pembangunan infrastruktur jalan, jembatan, dan gedung perkantoran dengan standar teknis tertinggi.', 'icon' => 'foundation'],
            ['name' => 'General Contractor', 'description' => 'Manajemen proyek menyeluruh dari perencanaan hingga serah terima, memastikan ketepatan waktu dan anggaran.', 'icon' => 'engineering'],
            ['name' => 'Maintenance Services', 'description' => 'Layanan pemeliharaan berkala untuk infrastruktur publik dan komersial guna menjaga keawetan aset.', 'icon' => 'build'],
            ['name' => 'Engineering Services', 'description' => 'Konsultansi teknik, studi kelayakan, dan desain arsitektur yang mengutamakan keberlanjutan.', 'icon' => 'architecture'],
        ];

        foreach ($services as $s) {
            Service::firstOrCreate(['name' => $s['name']], $s);
        }

        // Sample projects
        $projects = [
            ['title' => 'Sudirman Business Center', 'category' => 'Corporate Office', 'description' => 'Pembangunan gedung perkantoran 30 lantai dengan sertifikasi Green Building.', 'is_featured' => true],
            ['title' => 'Tol Trans-Jawa Paket 4', 'category' => 'Infrastructure', 'description' => 'Pembangunan jalan tol sepanjang 42 km sebagai bagian dari jaringan Trans-Jawa.', 'is_featured' => true],
            ['title' => 'PLN Power Plant Repair', 'category' => 'Maintenance', 'description' => 'Pemeliharaan dan perbaikan total fasilitas pembangkit listrik PLN Jawa Tengah.', 'is_featured' => false],
            ['title' => 'Logistics Hub Cikarang', 'category' => 'Industrial', 'description' => 'Fasilitas gudang pintar dengan luas total 50.000 meter persegi di kawasan industri Cikarang.', 'is_featured' => true],
            ['title' => 'Jembatan Lintas Nusantara', 'category' => 'Infrastructure', 'description' => 'Pembangunan jembatan penghubung antar pulau dengan bentang utama 500 meter.', 'is_featured' => false],
            ['title' => 'Dwi Artha Tower', 'category' => 'Building', 'description' => 'Pembangunan gedung pencakar langit 45 lantai di pusat kota Surabaya.', 'is_featured' => false],
        ];

        foreach ($projects as $p) {
            Project::firstOrCreate(['title' => $p['title']], $p);
        }

        // Sample clients
        $clients = [
            ['name' => 'PERTAMINA'],
            ['name' => 'WIKA'],
            ['name' => 'ADHI KARYA'],
            ['name' => 'PLN'],
            ['name' => 'PUPR'],
            ['name' => 'TELKOM'],
        ];

        foreach ($clients as $c) {
            Client::firstOrCreate(['name' => $c['name']], $c);
        }
    }
}
