<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use App\Models\User;
use App\Models\PageSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@dwiarthaprima.com');
        $adminPassword = env('ADMIN_PASSWORD');

        if (!is_string($adminPassword) || trim($adminPassword) === '') {
            $adminPassword = app()->environment('local') ? 'password' : Str::random(32);
        }

        $admin = User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Administrator',
                'password' => Hash::make($adminPassword),
            ]
        );

        $admin->forceFill(['is_admin' => true])->save();

        // Page settings (copy that matches the UI and business)
        $pageSettings = [
            ['page' => 'home', 'key' => 'home_hero_title', 'value' => 'PT Dwi Artha Prima'],
            ['page' => 'home', 'key' => 'home_hero_subtitle', 'value' => 'Solusi Konstruksi, Infrastruktur, dan Engineering Terpercaya'],
            ['page' => 'home', 'key' => 'home_about_title', 'value' => 'Membangun Infrastruktur yang Tangguh, Aman, dan Tepat Waktu.'],
            ['page' => 'home', 'key' => 'home_about_desc', 'value' => "PT Dwi Artha Prima berfokus pada pekerjaan konstruksi dan jasa engineering dengan standar mutu yang terukur. Kami mendampingi proyek dari tahap perencanaan, pengadaan, hingga pelaksanaan dan serah terima, dengan prioritas pada keselamatan kerja, ketepatan waktu, dan transparansi biaya.\n\nKami berkomitmen menghadirkan hasil yang andal untuk proyek jalan dan jembatan, bangunan, kawasan industri, serta pekerjaan pemeliharaan (maintenance)."],

            ['page' => 'project', 'key' => 'project_hero_title', 'value' => 'Portofolio Proyek'],
            ['page' => 'project', 'key' => 'project_hero_desc', 'value' => 'Contoh pekerjaan yang merepresentasikan kapabilitas kami di bidang konstruksi, infrastruktur, dan engineering—dengan fokus pada kualitas, keselamatan, dan delivery.' ],
            ['page' => 'project', 'key' => 'project_cta_title', 'value' => 'Siap memulai proyek Anda?' ],
            ['page' => 'project', 'key' => 'project_cta_desc', 'value' => "Diskusikan kebutuhan proyek Anda bersama tim kami. Kami siap memberikan masukan teknis, estimasi, dan rencana kerja yang realistis." ],
        ];

        foreach ($pageSettings as $s) {
            PageSetting::updateOrCreate(
                ['page' => $s['page'], 'key' => $s['key']],
                ['value' => $s['value']]
            );
        }

        // Sample services
        $services = [
            ['name' => 'Konstruksi Infrastruktur', 'description' => 'Pembangunan jalan, drainase, jembatan, dan pekerjaan struktur dengan standar teknis serta mutu material yang terukur.', 'icon' => 'construction'],
            ['name' => 'Gedung & Bangunan', 'description' => 'Pekerjaan gedung perkantoran, fasilitas umum, dan bangunan penunjang dengan pengendalian kualitas dan keselamatan kerja.', 'icon' => 'apartment'],
            ['name' => 'Engineering & Design', 'description' => 'Kajian teknis, estimasi biaya, shop drawing, dan perencanaan metode kerja yang efisien dan dapat dipertanggungjawabkan.', 'icon' => 'architecture'],
            ['name' => 'General Contractor', 'description' => 'Manajemen proyek end-to-end: schedule, kontrol biaya, koordinasi subkontraktor, hingga commissioning dan serah terima.', 'icon' => 'engineering'],
            ['name' => 'Maintenance & Retrofit', 'description' => 'Pemeliharaan aset, perkuatan struktur, perbaikan beton, waterproofing, dan pekerjaan remedial untuk memperpanjang umur bangunan.', 'icon' => 'handyman'],
            ['name' => 'Kawasan Industri', 'description' => 'Pembangunan infrastruktur kawasan: jalan internal, utilitas dasar, dan pekerjaan sipil pendukung untuk area operasional industri.', 'icon' => 'factory'],
            ['name' => 'Pengadaan Material', 'description' => 'Pengadaan material dan peralatan dengan kontrol spesifikasi, dokumentasi, dan ketertelusuran (traceability).', 'icon' => 'inventory_2'],
            ['name' => 'K3 & QA/QC', 'description' => 'Pendampingan implementasi K3, inspeksi, dan pengujian mutu untuk memastikan pekerjaan sesuai standar dan gambar kerja.', 'icon' => 'policy'],
        ];

        foreach ($services as $s) {
            Service::firstOrCreate(['name' => $s['name']], $s);
        }

        // Sample projects
        $projects = [
            ['title' => 'Peningkatan Jalan Arteri Kota', 'category' => 'Infrastruktur Jalan', 'description' => 'Pekerjaan perbaikan perkerasan, marka, dan drainase untuk meningkatkan kapasitas dan keselamatan lalu lintas.', 'is_featured' => true],
            ['title' => 'Rehabilitasi Jembatan Sungai', 'category' => 'Jembatan', 'description' => 'Penguatan struktur, perbaikan bearing, serta pekerjaan pendekat (approach) untuk memperpanjang umur layanan jembatan.', 'is_featured' => true],
            ['title' => 'Gedung Operasional & Kantor', 'category' => 'Bangunan', 'description' => 'Pembangunan gedung operasional dengan ruang kerja, area meeting, dan fasilitas pendukung yang fungsional.', 'is_featured' => true],
            ['title' => 'Pembangunan Gudang & Workshop', 'category' => 'Industrial', 'description' => 'Pekerjaan bangunan gudang dan workshop termasuk lantai industri, utilitas, dan pengaturan area kerja.', 'is_featured' => false],
            ['title' => 'Drainase & Normalisasi Saluran', 'category' => 'Drainase', 'description' => 'Pembersihan, perbaikan lining, dan peningkatan kapasitas saluran untuk mengurangi genangan di area padat.', 'is_featured' => false],
            ['title' => 'Perkuatan Struktur (Retrofitting)', 'category' => 'Maintenance', 'description' => 'Pekerjaan perkuatan kolom/balok, perbaikan beton, dan proteksi korosi untuk meningkatkan keandalan struktur.', 'is_featured' => false],
            ['title' => 'Infrastruktur Kawasan Industri', 'category' => 'Kawasan Industri', 'description' => 'Pekerjaan jalan internal, utilitas dasar, dan pekerjaan sipil pendukung untuk area operasional.', 'is_featured' => false],
            ['title' => 'Renovasi Fasilitas Publik', 'category' => 'Bangunan', 'description' => 'Pembaruan area layanan, peningkatan aksesibilitas, dan penyegaran interior/eksterior sesuai kebutuhan operasional.', 'is_featured' => false],
            ['title' => 'Pekerjaan Struktur Beton Bertulang', 'category' => 'Struktur', 'description' => 'Pekerjaan struktur utama dengan pengujian mutu, kontrol material, dan dokumentasi QA/QC.', 'is_featured' => false],
            ['title' => 'Pekerjaan Utilitas Dasar', 'category' => 'Utilitas', 'description' => 'Pekerjaan utilitas sipil pendukung: ducting, manhole, dan pekerjaan pelengkap untuk area proyek.', 'is_featured' => false],
        ];

        foreach ($projects as $p) {
            Project::firstOrCreate(['title' => $p['title']], $p);
        }

        // Sample clients
        $clients = [
            ['name' => 'Kementerian PUPR'],
            ['name' => 'PT PLN (Persero)'],
            ['name' => 'PT Pertamina (Persero)'],
            ['name' => 'PT Jasa Marga (Persero) Tbk'],
            ['name' => 'PT Hutama Karya (Persero)'],
            ['name' => 'PT Waskita Karya (Persero) Tbk'],
            ['name' => 'PT Wijaya Karya (Persero) Tbk'],
            ['name' => 'PT Adhi Karya (Persero) Tbk'],
            ['name' => 'PT Telkom Indonesia (Persero) Tbk'],
            ['name' => 'Pemerintah Provinsi DKI Jakarta'],
            ['name' => 'Pemerintah Provinsi Jawa Barat'],
            ['name' => 'BUMD Infrastruktur'],
        ];

        foreach ($clients as $c) {
            Client::firstOrCreate(['name' => $c['name']], $c);
        }
    }
}
