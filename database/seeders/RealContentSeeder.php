<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\PageSetting;
use App\Models\Project;
use App\Models\Service;
use App\Models\SocialMedia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealContentSeeder extends Seeder
{
    public function run()
    {
        // 1. Page Settings
        $settings = [
            ['page' => 'home', 'key' => 'home_hero_title', 'value' => 'PT Dwi Artha Prima'],
            ['page' => 'home', 'key' => 'home_hero_subtitle', 'value' => 'Mitra Strategis dalam Pembangunan Konstruksi dan Infrastruktur Nasional'],
            ['page' => 'home', 'key' => 'home_about_title', 'value' => 'Mewujudkan Infrastruktur yang Tangguh melalui Integritas dan Presisi.'],
            ['page' => 'home', 'key' => 'home_about_desc', 'value' => "PT Dwi Artha Prima adalah mitra strategis dalam sektor konstruksi dan infrastruktur di Indonesia. Kami menghadirkan integritas, inovasi, dan kualitas dalam setiap proyek yang kami tangani.\n\nKami berkomitmen dalam menyediakan layanan pekerjaan secara profesional dan tepat waktu, didukung oleh tenaga kerja berpengalaman serta standar mutu (QA/QC) dan keselamatan kerja (K3) yang konsisten guna memberikan hasil yang andal bagi setiap stakeholder."],
            ['page' => 'home', 'key' => 'home_vision', 'value' => 'Menjadi perusahaan jasa konstruksi terkemuka yang diakui secara nasional atas kualitas dan komitmen terhadap keselamatan kerja.'],
            ['page' => 'home', 'key' => 'home_mission', 'value' => 'Memberikan solusi teknis yang inovatif dan efisien untuk memenuhi harapan klien melalui profesionalisme dan keunggulan operasional.'],
            ['page' => 'home', 'key' => 'home_stats_years', 'value' => '15+'],
            ['page' => 'home', 'key' => 'home_stats_projects', 'value' => '200+'],
            ['page' => 'home', 'key' => 'home_stats_clients', 'value' => '50+'],
            ['page' => 'home', 'key' => 'home_stats_regions', 'value' => '12+'],
            ['page' => 'project', 'key' => 'project_hero_title', 'value' => 'Portofolio Proyek'],
            ['page' => 'project', 'key' => 'project_hero_desc', 'value' => 'Representasi kapabilitas kami dalam menangani berbagai skala pekerjaan konstruksi, infrastruktur, dan engineering dengan mengedepankan standar kualitas serta ketepatan waktu.'],
            ['page' => 'project', 'key' => 'project_cta_title', 'value' => 'Kemitraan Strategis untuk Proyek Anda'],
            ['page' => 'project', 'key' => 'project_cta_desc', 'value' => 'Sampaikan spesifikasi proyek Anda untuk mendapatkan analisis metode kerja awal serta estimasi biaya yang kompetitif dan realistis dari tim ahli kami.'],
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

        foreach ($settings as $s) {
            PageSetting::updateOrCreate(['page' => $s['page'], 'key' => $s['key']], ['value' => $s['value']]);
        }

        // 2. Social Media
        $socials = [
            ['name' => 'LinkedIn', 'icon' => 'hub', 'url' => 'https://linkedin.com/company/dwiarthaprima', 'order' => 1, 'is_active' => true],
            ['name' => 'Instagram', 'icon' => 'photo_camera', 'url' => 'https://instagram.com/dwiarthaprima', 'order' => 2, 'is_active' => true],
        ];

        foreach ($socials as $soc) {
            SocialMedia::updateOrCreate(['name' => $soc['name']], $soc);
        }

        // 3. Services
        $services = [
            ['name' => 'Konstruksi Infrastruktur', 'description' => 'Pembangunan sarana transportasi, sistem drainase, jembatan, dan pekerjaan struktur sipil lainnya dengan kepatuhan tinggi terhadap standar teknis.', 'icon' => 'construction'],
            ['name' => 'Gedung & Bangunan', 'description' => 'Pelaksanaan pembangunan gedung perkantoran, fasilitas publik, dan bangunan industrial dengan fokus pada aspek struktural dan keselamatan.', 'icon' => 'apartment'],
            ['name' => 'Engineering & Design', 'description' => 'Penyusunan kajian teknis, estimasi biaya (RAB), pembuatan shop drawing, serta pengembangan metode kerja yang efektif dan efisien.', 'icon' => 'architecture'],
            ['name' => 'General Contractor', 'description' => 'Layanan manajemen proyek menyeluruh yang mencakup pengendalian jadwal, manajemen anggaran, koordinasi teknis, hingga penyerahan akhir.', 'icon' => 'engineering'],
            ['name' => 'Maintenance & Retrofit', 'description' => 'Layanan pemeliharaan aset, perkuatan struktur, rehabilitasi beton, dan pekerjaan remedial guna menjaga integritas bangunan jangka panjang.', 'icon' => 'handyman'],
            ['name' => 'Kawasan Industri', 'description' => 'Pengembangan infrastruktur kawasan terpadu meliputi pembangunan jalan internal, jaringan utilitas, dan pekerjaan sipil pendukung operasional.', 'icon' => 'factory'],
            ['name' => 'Pengadaan Material', 'description' => 'Pengadaan material dan peralatan dengan kontrol spesifikasi, dokumentasi, dan ketertelusuran (traceability).', 'icon' => 'inventory_2'],
            ['name' => 'K3 & QA/QC', 'description' => 'Pendampingan implementasi K3, inspeksi, dan pengujian mutu untuk memastikan pekerjaan sesuai standar dan gambar kerja.', 'icon' => 'policy'],
        ];

        foreach ($services as $ser) {
            Service::updateOrCreate(['name' => $ser['name']], $ser);
        }

        // 4. Clients
        $clients = [
            ['name' => 'Rumah Sakit SILOAM'],
            ['name' => 'Kementerian PUPR'],
            ['name' => 'PT PLN (Persero)'],
            ['name' => 'PT Pertamina (Persero)'],
            ['name' => 'PT Jasa Marga (Persero) Tbk'],
        ];

        foreach ($clients as $cli) {
            Client::firstOrCreate(['name' => $cli['name']], $cli);
        }
    }
}
