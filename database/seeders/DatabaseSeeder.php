<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
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

        // Sample inbox messages (for admin demo)
        $messages = [
            [
                'name' => 'Procurement - PT Nusantara Energi',
                'email' => 'procurement@nusantara-energi.co.id',
                'subject' => 'Permintaan Penawaran (RAB) Pekerjaan Civil',
                'message' => "Yth. Tim PT Dwi Artha Prima,\n\nKami membutuhkan penawaran awal untuk pekerjaan civil (perbaikan drainase dan perkerasan) di area operasional. Mohon informasi kebutuhan data/site visit and estimasi timeline.\n\nTerima kasih.",
                'is_read' => false,
            ],
            [
                'name' => 'Project Manager - PT Kawasan Industri',
                'email' => 'pm@kawasan-industri.id',
                'subject' => 'Konsultasi Pembangunan Gudang & Workshop',
                'message' => "Kami berencana membangun gudang and workshop (±2.500 m2). Mohon arahan scope kerja, opsi material, serta estimasi biaya and durasi pekerjaan.\n\nLokasi: Jawa Barat.",
                'is_read' => true,
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
