<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * table_articles.id tidak auto_increment, jadi id diisi manual.
     * Pakai updateOrInsert supaya aman dijalankan berkali-kali (idempotent).
     */
    public function run(): void
    {
        $articles = [
            ['id' => 1,  'user_id' => 2, 'article_type' => 'service', 'title' => 'Konsultasi Bisnis',              'slug' => 'konsultasi-bisnis',              'image' => 'https://placehold.co/300x300',              'content' => 'Layanan konsultasi bisnis untuk membantu strategi pertumbuhan dan efisiensi operasional perusahaan Anda.', 'is_published' => 1, 'created' => '2026-07-20 09:00:00', 'updated' => '2026-07-20 09:00:00'],
            ['id' => 2,  'user_id' => 2, 'article_type' => 'service', 'title' => 'Jasa Legalitas Perusahaan',      'slug' => 'jasa-legalitas-perusahaan',      'image' => 'https://placehold.co/300x300',      'content' => 'Pengurusan izin usaha, akta pendirian, dan dokumen legalitas perusahaan secara lengkap dan cepat.', 'is_published' => 1, 'created' => '2026-07-22 10:30:00', 'updated' => '2026-07-22 10:30:00'],
            ['id' => 3,  'user_id' => 2, 'article_type' => 'service', 'title' => 'Pendampingan Perizinan',        'slug' => 'pendampingan-perizinan',        'image' => "https://placehold.co/300x300",                                          'content' => 'Pendampingan proses perizinan usaha dari awal hingga terbit, termasuk konsultasi regulasi terkait.', 'is_published' => 0, 'created' => '2026-07-25 13:15:00', 'updated' => '2026-07-25 13:15:00'],
            ['id' => 4,  'user_id' => 2, 'article_type' => 'service', 'title' => 'Audit Keuangan',                 'slug' => 'audit-keuangan',                 'image' => 'https://placehold.co/300x300',                 'content' => 'Jasa audit laporan keuangan perusahaan sesuai standar akuntansi yang berlaku di Indonesia.', 'is_published' => 1, 'created' => '2026-07-27 08:45:00', 'updated' => '2026-07-27 08:45:00'],
            ['id' => 5,  'user_id' => 2, 'article_type' => 'service', 'title' => 'Manajemen Sumber Daya Manusia', 'slug' => 'manajemen-sumber-daya-manusia', 'image' => 'https://placehold.co/300x300',                                          'content' => 'Layanan pengelolaan SDM mulai dari rekrutmen, pelatihan, hingga evaluasi kinerja karyawan.', 'is_published' => 0, 'created' => '2026-07-29 15:00:00', 'updated' => '2026-07-29 15:00:00'],
            ['id' => 6,  'user_id' => 2, 'article_type' => 'blog',    'title' => 'Tips Memulai Usaha Kecil',      'slug' => 'tips-memulai-usaha-kecil',      'image' => 'https://placehold.co/300x300',      'content' => 'Beberapa langkah praktis yang bisa diikuti pemula sebelum memulai usaha kecil dari nol.', 'is_published' => 1, 'created' => '2026-07-18 07:20:00', 'updated' => '2026-07-18 07:20:00'],
            ['id' => 7,  'user_id' => 2, 'article_type' => 'blog',    'title' => 'Update Regulasi 2026',          'slug' => 'update-regulasi-2026',          'image' => 'https://placehold.co/300x300',          'content' => 'Rangkuman perubahan regulasi usaha terbaru tahun 2026 yang perlu diketahui pelaku bisnis.', 'is_published' => 1, 'created' => '2026-07-21 11:10:00', 'updated' => '2026-07-21 11:10:00'],
            ['id' => 8,  'user_id' => 2, 'article_type' => 'blog',    'title' => 'Studi Kasus Klien',              'slug' => 'studi-kasus-klien',              'image' => 'https://placehold.co/300x300',                                          'content' => 'Studi kasus keberhasilan salah satu klien setelah menggunakan layanan konsultasi bisnis kami.', 'is_published' => 0, 'created' => '2026-07-29 16:40:00', 'updated' => '2026-07-29 16:40:00'],
            ['id' => 9,  'user_id' => 2, 'article_type' => 'blog',    'title' => 'Strategi Pemasaran Digital',    'slug' => 'strategi-pemasaran-digital',    'image' => 'https://placehold.co/300x300',    'content' => 'Strategi pemasaran digital sederhana yang efektif untuk usaha kecil dan menengah.', 'is_published' => 1, 'created' => '2026-07-30 09:50:00', 'updated' => '2026-07-30 09:50:00'],
            ['id' => 10, 'user_id' => 2, 'article_type' => 'blog',    'title' => 'Mengelola Arus Kas Usaha',      'slug' => 'mengelola-arus-kas-usaha',      'image' => 'https://placehold.co/300x300',                                          'content' => 'Panduan singkat mengelola arus kas agar usaha tetap sehat secara finansial dalam jangka panjang.', 'is_published' => 0, 'created' => '2026-08-01 14:25:00', 'updated' => '2026-08-01 14:25:00'],
        ];

        foreach ($articles as $article) {
            DB::table('table_articles')->updateOrInsert(
                ['id' => $article['id']],
                $article
            );
        }
    }
}
