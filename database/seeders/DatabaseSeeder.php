<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Message;
use App\Models\PageSetting;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
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

        // Page settings (copywriting defaults)
        $pageSettings = [
            ['page' => 'home', 'key' => 'home_hero_title', 'value' => 'PT Dwi Artha Prima'],
            ['page' => 'home', 'key' => 'home_hero_subtitle', 'value' => 'Mitra Strategis dalam Pembangunan Konstruksi dan Infrastruktur Nasional'],
            ['page' => 'home', 'key' => 'home_about_title', 'value' => 'Mewujudkan Infrastruktur yang Tangguh melalui Integritas dan Presisi.'],
            ['page' => 'home', 'key' => 'home_about_desc', 'value' => "PT Dwi Artha Prima adalah mitra strategis dalam sektor konstruksi dan infrastruktur di Indonesia. Kami menghadirkan integritas, inovasi, dan kualitas dalam setiap proyek yang kami tangani.\n\nKami berkomitmen dalam menyediakan layanan pekerjaan secara profesional dan tepat waktu, didukung oleh tenaga kerja berpengalaman serta standar mutu (QA/QC) dan keselamatan kerja (K3) yang konsisten guna memberikan hasil yang andal bagi setiap stakeholder."],

            ['page' => 'project', 'key' => 'project_hero_title', 'value' => 'Portofolio Proyek'],
            ['page' => 'project', 'key' => 'project_hero_desc', 'value' => 'Representasi kapabilitas kami dalam menangani berbagai skala pekerjaan konstruksi, infrastruktur, dan engineering dengan mengedepankan standar kualitas serta ketepatan waktu.'],
            ['page' => 'project', 'key' => 'project_cta_title', 'value' => 'Kemitraan Strategis untuk Proyek Anda'],
            ['page' => 'project', 'key' => 'project_cta_desc', 'value' => "Sampaikan spesifikasi proyek Anda untuk mendapatkan analisis metode kerja awal serta estimasi biaya yang kompetitif dan realistis dari tim ahli kami."],

            ['page' => 'about', 'key' => 'about_hero_title', 'value' => 'Mitra Konstruksi & Engineering yang Terukur'],
            ['page' => 'about', 'key' => 'about_hero_desc', 'value' => 'Berkomitmen menyediakan layanan konstruksi dan infrastruktur dengan standar K3, pengendalian mutu, dan manajemen proyek yang disiplin.'],
            ['page' => 'about', 'key' => 'about_story_title', 'value' => 'Profil Perusahaan'],
            ['page' => 'about', 'key' => 'about_story_desc', 'value' => "PT Dwi Artha Prima berfokus pada pekerjaan konstruksi, infrastruktur, dan jasa engineering. Kami memiliki pengalaman dalam menangani berbagai cakupan pekerjaan sipil, mekanikal, dan elektrikal dengan dukungan tenaga kerja yang kompeten di bidangnya.\n\nSetiap langkah operasional kami berlandaskan pada prinsip profesionalisme dan integritas, di mana aspek keselamatan kerja serta pengendalian mutu (QA/QC) menjadi standar baku yang kami terapkan secara konsisten di setiap pekerjaan."],
            ['page' => 'about', 'key' => 'about_vision', 'value' => 'Menjadi perusahaan jasa konstruksi terpercaya yang diakui secara nasional atas kualitas pekerjaan dan integritas dalam bermitra.'],
            ['page' => 'about', 'key' => 'about_mission', 'value' => "Mengimplementasikan standar K3 dan pengendalian mutu (QA/QC) secara ketat di setiap proyek.\nMenjamin ketepatan waktu penyelesaian melalui perencanaan dan pengawasan progres yang sistematis.\nMemberikan solusi teknis dan engineering yang efisien serta dapat dipertanggungjawabkan."],

            ['page' => 'services', 'key' => 'services_hero_title', 'value' => 'Layanan Konstruksi & Engineering Terintegrasi'],
            ['page' => 'services', 'key' => 'services_hero_desc', 'value' => 'Dari tahap perencanaan hingga pelaksanaan lapangan, kami menyediakan layanan komprehensif dengan fokus pada mutu pekerjaan dan keselamatan kerja.'],
            ['page' => 'services', 'key' => 'services_cta_title', 'value' => 'Permintaan Estimasi & Konsultasi Teknis'],
            ['page' => 'services', 'key' => 'services_cta_desc', 'value' => 'Diskusikan spesifikasi proyek Anda bersama tenaga ahli kami untuk mendapatkan estimasi yang realistis sesuai kebutuhan anggaran dan jadwal.'],

            ['page' => 'contact', 'key' => 'contact_email', 'value' => 'info@dwiarthaprima.com'],
            ['page' => 'contact', 'key' => 'contact_phone', 'value' => '+62 (21) 555-0123'],
            ['page' => 'contact', 'key' => 'contact_whatsapp', 'value' => 'https://wa.me/6221555123'],
            ['page' => 'contact', 'key' => 'contact_address', 'value' => 'Gedung Artha Prima Lt. 5, Jl. Gatot Subroto No. 12, Jakarta Selatan, 12190'],
            ['page' => 'contact', 'key' => 'contact_hours', 'value' => 'Senin–Jumat, 08:00–17:00 WIB'],
        ];

        foreach ($pageSettings as $setting) {
            PageSetting::firstOrCreate(
                ['page' => $setting['page'], 'key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }

        // Sample services
        $services = [
            ['name' => 'Konstruksi Infrastruktur', 'description' => 'Pembangunan sarana transportasi, sistem drainase, jembatan, dan pekerjaan struktur sipil lainnya dengan kepatuhan tinggi terhadap standar teknis.', 'icon' => 'construction'],
            ['name' => 'Gedung & Bangunan', 'description' => 'Pelaksanaan pembangunan gedung perkantoran, fasilitas publik, dan bangunan industrial dengan fokus pada aspek struktural dan keselamatan.', 'icon' => 'apartment'],
            ['name' => 'Engineering & Design', 'description' => 'Penyusunan kajian teknis, estimasi biaya (RAB), pembuatan shop drawing, serta pengembangan metode kerja yang efektif dan efisien.', 'icon' => 'architecture'],
            ['name' => 'General Contractor', 'description' => 'Layanan manajemen proyek menyeluruh yang mencakup pengendalian jadwal, manajemen anggaran, koordinasi teknis, hingga penyerahan akhir.', 'icon' => 'engineering'],
            ['name' => 'Maintenance & Retrofit', 'description' => 'Layanan pemeliharaan aset, perkuatan struktur, rehabilitasi beton, dan pekerjaan remedial guna menjaga integritas bangunan jangka panjang.', 'icon' => 'handyman'],
            ['name' => 'Kawasan Industri', 'description' => 'Pengembangan infrastruktur kawasan terpadu meliputi pembangunan jalan internal, jaringan utilitas, dan pekerjaan sipil pendukung operasional.', 'icon' => 'factory'],
            ['name' => 'Pengadaan Material', 'description' => 'Layanan pengadaan material konstruksi dan peralatan proyek dengan sistem kendali spesifikasi dan ketertelusuran yang ketat.', 'icon' => 'inventory_2'],
            ['name' => 'K3 & QA/QC', 'description' => 'Pengawasan implementasi K3 serta pengendalian mutu lapangan guna memastikan seluruh pekerjaan sesuai dengan spesifikasi teknis dan standar baku.', 'icon' => 'policy'],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['name' => $service['name']], $service);
        }

        // Sample projects
        $projects = [
            ['title' => 'Peningkatan Jalan Arteri Kota', 'category' => 'Infrastruktur Jalan', 'description' => 'Pelaksanaan pekerjaan peningkatan struktur jalan arteri yang meliputi perkerasan aspal, sistem drainase, dan perlengkapan jalan sesuai spesifikasi teknis.', 'is_featured' => true],
            ['title' => 'Rehabilitasi Jembatan Sungai', 'category' => 'Jembatan', 'description' => 'Pekerjaan rehabilitasi dan perkuatan struktur jembatan, termasuk penggantian bearing pad serta pemeliharaan elemen struktural lainnya.', 'is_featured' => true],
            ['title' => 'Gedung Operasional & Kantor', 'category' => 'Bangunan', 'description' => 'Pembangunan gedung operasional yang mencakup pekerjaan struktur, arsitektur, dan fasilitas penunjang dengan standar keselamatan tinggi.', 'is_featured' => true],
            ['title' => 'Pembangunan Gudang & Workshop', 'category' => 'Industrial', 'description' => 'Pekerjaan bangunan gudang dan workshop termasuk lantai industri, utilitas, dan pengaturan area kerja.', 'is_featured' => false],
            ['title' => 'Drainase & Normalisasi Saluran', 'category' => 'Drainase', 'description' => 'Pembersihan, perbaikan lining, dan peningkatan kapasitas saluran untuk mengurangi genangan di area padat.', 'is_featured' => false],
            ['title' => 'Perkuatan Struktur (Retrofitting)', 'category' => 'Maintenance', 'description' => 'Pekerjaan perkuatan kolom/balok, perbaikan beton, dan proteksi korosi untuk meningkatkan keandalan struktur.', 'is_featured' => false],
            ['title' => 'Infrastruktur Kawasan Industri', 'category' => 'Kawasan Industri', 'description' => 'Pekerjaan jalan internal, utilitas dasar, dan pekerjaan sipil pendukung untuk area operasional.', 'is_featured' => false],
            ['title' => 'Renovasi Fasilitas Publik', 'category' => 'Bangunan', 'description' => 'Pembaruan area layanan, peningkatan aksesibilitas, dan penyegaran interior/eksterior sesuai kebutuhan operasional.', 'is_featured' => false],
            ['title' => 'Pekerjaan Struktur Beton Bertulang', 'category' => 'Struktur', 'description' => 'Pekerjaan struktur utama dengan pengujian mutu, kontrol material, dan dokumentasi QA/QC.', 'is_featured' => false],
            ['title' => 'Pekerjaan Utilitas Dasar', 'category' => 'Utilitas', 'description' => 'Pekerjaan utilitas sipil pendukung: ducting, manhole, dan pekerjaan pelengkap untuk area proyek.', 'is_featured' => false],
        ];

        if (Project::query()->count() === 0) {
            $hasSlug = Schema::hasColumn('projects', 'slug');
            $usedSlugs = [];
            if ($hasSlug) {
                $usedSlugs = Project::query()->pluck('slug')->filter()->values()->all();
            }

            foreach ($projects as $project) {
                if ($hasSlug) {
                    $base = Str::slug($project['title']);
                    if ($base === '') {
                        $base = 'project';
                    }

                    $slug = $base;
                    $i = 2;
                    while (in_array($slug, $usedSlugs, true) || Project::query()->where('slug', $slug)->exists()) {
                        $slug = "{$base}-{$i}";
                        $i++;
                    }
                    $usedSlugs[] = $slug;

                    $project['slug'] = $slug;
                }

                Project::create($project);
            }
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

        foreach ($clients as $client) {
            Client::firstOrCreate(['name' => $client['name']], $client);
        }

        // Sample inbox messages (for admin demo)
        $messages = [
            [
                'name' => 'Procurement - PT Nusantara Energi',
                'email' => 'procurement@nusantara-energi.co.id',
                'subject' => 'Permintaan Penawaran (RAB) Pekerjaan Civil',
                'message' => "Yth. Tim PT Dwi Artha Prima,\n\nKami membutuhkan penawaran awal untuk pekerjaan civil (perbaikan drainase dan perkerasan) di area operasional. Mohon informasi kebutuhan data/site visit dan estimasi timeline.\n\nTerima kasih.",
                'is_read' => false,
            ],
            [
                'name' => 'Project Manager - PT Kawasan Industri',
                'email' => 'pm@kawasan-industri.id',
                'subject' => 'Konsultasi Pembangunan Gudang & Workshop',
                'message' => "Kami berencana membangun gudang dan workshop (±2.500 m2). Mohon arahan scope kerja, opsi material, serta estimasi biaya dan durasi pekerjaan.\n\nLokasi: Jawa Barat.",
                'is_read' => true,
            ],
            [
                'name' => 'Admin - Pemerintah Daerah',
                'email' => 'admin@pemda.go.id',
                'subject' => 'Permohonan Profil Perusahaan & Portofolio',
                'message' => "Mohon kirimkan profil perusahaan, legalitas, dan portofolio proyek terkait pekerjaan jalan/jembatan untuk kebutuhan evaluasi vendor.\n\nTerima kasih.",
                'is_read' => false,
            ],
        ];

        if (Message::query()->count() === 0) {
            foreach ($messages as $message) {
                Message::create($message);
            }
        }

        // Add real content from live updates
        $this->call(RealContentSeeder::class);
    }
}
