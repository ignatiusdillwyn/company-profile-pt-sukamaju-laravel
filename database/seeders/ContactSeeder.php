<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * table_contacts.id tidak auto_increment, jadi id diisi manual.
     * Pakai updateOrInsert supaya aman dijalankan berkali-kali (idempotent).
     */
    public function run(): void
    {
        $contacts = [
            ['id' => 1, 'fullname' => 'Budi Santoso',    'email' => 'budi.santoso@example.com',    'phone' => '081234567801', 'notes' => 'Ingin tanya soal harga jasa konsultasi bisnis untuk UMKM.',        'is_read' => 1, 'created' => '2026-07-20 09:15:00', 'updated' => '2026-07-20 09:15:00'],
            ['id' => 2, 'fullname' => 'Siti Nurhaliza',  'email' => 'siti.nurhaliza@example.com',  'phone' => '081234567802', 'notes' => 'Butuh info jadwal pendampingan perizinan usaha minggu depan.',    'is_read' => 1, 'created' => '2026-07-22 10:40:00', 'updated' => '2026-07-22 10:40:00'],
            ['id' => 3, 'fullname' => 'Andi Wijaya',     'email' => 'andi.wijaya@example.com',     'phone' => '081234567803', 'notes' => 'Apakah bisa konsultasi audit keuangan secara online?',            'is_read' => 0, 'created' => '2026-07-24 13:05:00', 'updated' => '2026-07-24 13:05:00'],
            ['id' => 4, 'fullname' => 'Dewi Lestari',    'email' => 'dewi.lestari@example.com',    'phone' => '081234567804', 'notes' => 'Minta penawaran harga untuk jasa legalitas perusahaan baru.',     'is_read' => 1, 'created' => '2026-07-25 08:30:00', 'updated' => '2026-07-25 08:30:00'],
            ['id' => 5, 'fullname' => 'Rudi Hartono',    'email' => 'rudi.hartono@example.com',    'phone' => '081234567805', 'notes' => 'Tertarik dengan layanan manajemen SDM, mohon dihubungi kembali.', 'is_read' => 0, 'created' => '2026-07-27 15:50:00', 'updated' => '2026-07-27 15:50:00'],
            ['id' => 6, 'fullname' => 'Maya Anggraini',  'email' => 'maya.anggraini@example.com',  'phone' => '081234567806', 'notes' => 'Ingin daftar sebagai member premium, bagaimana caranya?',         'is_read' => 0, 'created' => '2026-07-29 11:20:00', 'updated' => '2026-07-29 11:20:00'],
            ['id' => 7, 'fullname' => 'Fajar Nugroho',   'email' => 'fajar.nugroho@example.com',   'phone' => '081234567807', 'notes' => 'Komplain terkait keterlambatan pengurusan izin usaha.',           'is_read' => 1, 'created' => '2026-07-30 16:10:00', 'updated' => '2026-07-30 16:10:00'],
            ['id' => 8, 'fullname' => 'Rina Marlina',    'email' => 'rina.marlina@example.com',    'phone' => '081234567808', 'notes' => 'Request kerja sama untuk pelatihan internal karyawan.',           'is_read' => 0, 'created' => '2026-08-01 09:00:00', 'updated' => '2026-08-01 09:00:00'],
        ];

        foreach ($contacts as $contact) {
            DB::table('table_contacts')->updateOrInsert(
                ['id' => $contact['id']],
                $contact
            );
        }
    }
}
