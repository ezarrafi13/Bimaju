<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Lesson;
use App\Models\LessonContent;
use App\Models\LessonTakeaway;
use App\Models\LessonResource;
use App\Models\User;
use App\Models\UserLessonProgress;

class LearningSeeder extends Seeder
{
    public function run(): void
    {
        $module = Module::create([
    'title' => 'Basic Finance Management',
    'category' => 'Finance',
    'level' => 'Beginner',
    'description' => 'Belajar dasar manajemen keuangan bisnis F&B: menyusun anggaran, memahami arus kas, dan menghitung laba untuk keputusan bisnis yang tepat.',
    'duration' => '3 hours',
    'total_lessons' => 6,
]);

$module2 = Module::create([
    'title' => 'Digital Marketing for F&B',
    'category' => 'Marketing',
    'level' => 'Beginner',
    'description' => 'Pahami strategi digital marketing untuk UMKM F&B: membangun brand, membuat konten menarik, dan meningkatkan penjualan online.',
    'duration' => '3 hours',
    'total_lessons' => 5,
]);

$module3 = Module::create([
    'title' => 'Food Costing & Pricing',
    'category' => 'Finance',
    'level' => 'Beginner',
    'description' => 'Pelajari cara menghitung HPP, menentukan harga jual yang tepat, dan menjaga profitabilitas produk F&B.',
    'duration' => '3 hours',
    'total_lessons' => 5,
]);

$module4 = Module::create([
    'title' => 'Customer Service Excellence',
    'category' => 'Business',
    'level' => 'Beginner',
    'description' => 'Pelajari cara memberikan pelayanan pelanggan terbaik untuk meningkatkan kepuasan dan loyalitas.',
    'duration' => '2 hours',
    'total_lessons' => 3,
]);

$module5 = Module::create([
    'title' => 'Menu Innovation Strategies',
    'category' => 'Business',
    'level' => 'Intermediate',
    'description' => 'Strategi inovasi menu untuk menarik pelanggan baru, menjaga loyalitas, dan meningkatkan penjualan.',
    'duration' => '2 hours',
    'total_lessons' => 3,
]);

$module6 = Module::create([
    'title' => 'Supply Chain Management',
    'category' => 'Operations',
    'level' => 'Intermediate',
    'description' => 'Pelajari cara mengelola rantai pasok agar produksi F&B lancar, efisien, dan kualitas terjaga.',
    'duration' => '2 hours',
    'total_lessons' => 3,
]);


        /**
         * Lesson 1 - Introduction to F&B Finance
         */
        $lesson1 = Lesson::create([
            'module_id' => $module->id,
            'title' => 'Introduction to F&B Finance',
            'order_number' => 1,
            'duration' => '8 menit',
            'estimated_time' => '5-10 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson1->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/L1_SX54Xc3A',
            'description' => 'Dapatkan gambaran umum tentang manajemen keuangan di industri Food & Beverage. Pelajari kenapa keuangan sangat penting untuk keberlangsungan bisnis.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Memahami pentingnya keuangan dalam F&B'],
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Mengenali istilah-istilah keuangan dasar'],
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Mengetahui bagaimana keuangan memengaruhi keputusan bisnis'],
        ]);

        LessonResource::insert([
            ['lesson_id' => $lesson1->id, 'title' => 'Dasar-dasar Keuangan (PDF)', 'type' => 'PDF', 'resource_link' => '/files/finance_intro.pdf'],
        ]);

        $quiz1 = Quiz::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Quiz: Introduction to F&B Finance',
            'description' => 'Tes pemahaman dasar tentang pentingnya manajemen keuangan dalam bisnis F&B.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Apa kepanjangan dari singkatan F&B?',
                'option_a' => 'Food and Beverage',
                'option_b' => 'Finance and Budget',
                'option_c' => 'Food and Business',
                'option_d' => 'Financial and Banking',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Mengapa manajemen keuangan penting untuk bisnis F&B?',
                'option_a' => 'Agar bisa membeli bahan lebih mahal',
                'option_b' => 'Untuk mengetahui apakah bisnis untung atau rugi',
                'option_c' => 'Supaya menu terlihat lebih menarik',
                'option_d' => 'Untuk memilih lokasi toko',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Salah satu manfaat pencatatan keuangan sederhana adalah...',
                'option_a' => 'Membuat harga jual selalu lebih mahal',
                'option_b' => 'Mengendalikan biaya dan memantau keuntungan',
                'option_c' => 'Menghilangkan kebutuhan promosi',
                'option_d' => 'Mengganti supplier setiap minggu',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 2 - Understanding Cash Flow
         */
        $lesson2 = Lesson::create([
            'module_id' => $module->id,
            'title' => 'Understanding Cash Flow',
            'order_number' => 2,
            'duration' => '12 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson2->id,
            'type' => 'text',
            'content_link' => null,
            'description' => 'Pelajari bagaimana uang masuk dan keluar dari bisnis F&B Anda, serta mengapa menjaga arus kas positif lebih penting daripada hanya melihat keuntungan kotor.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Membedakan arus kas masuk dan keluar'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Memahami arus kas operasional vs investasi'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Cara menjaga arus kas tetap positif'],
        ]);

        LessonResource::create([
            'lesson_id' => $lesson2->id,
            'title' => 'Template Arus Kas',
            'type' => 'Excel',
            'resource_link' => '/files/arus_kas_template.xlsx',
        ]);

        $quiz2 = Quiz::create([
            'lesson_id' => $lesson2->id,
            'title' => 'Quiz: Understanding Cash Flow',
            'description' => 'Uji pemahaman tentang arus kas dan cara menjaganya tetap positif.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Arus kas masuk berasal dari ...',
                'option_a' => 'Pembayaran pelanggan / penjualan',
                'option_b' => 'Pembelian bahan baku',
                'option_c' => 'Pembayaran gaji',
                'option_d' => 'Pembayaran listrik',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Arus kas operasional berbeda dengan arus kas investasi karena ...',
                'option_a' => 'Operasional berkaitan dengan kegiatan sehari-hari bisnis',
                'option_b' => 'Investasi berkaitan dengan pemasaran',
                'option_c' => 'Operasional hanya untuk pemilik',
                'option_d' => 'Investasi adalah biaya listrik',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Salah satu cara menjaga arus kas tetap positif adalah...',
                'option_a' => 'Menunda pencatatan penjualan',
                'option_b' => 'Menambah pengeluaran tanpa perencanaan',
                'option_c' => 'Mengelola piutang dan stok dengan baik',
                'option_d' => 'Mengurangi harga jual tanpa analisa',
                'correct_answer' => 'C',
            ],
        ]);

        /**
         * Lesson 3 - Basic Accounting Principles
         */
        $lesson3 = Lesson::create([
            'module_id' => $module->id,
            'title' => 'Basic Accounting Principles',
            'order_number' => 3,
            'duration' => '15 menit',
            'estimated_time' => '15-20 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson3->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/L1_SX54Xc3A',
            'description' => 'Pelajari prinsip-prinsip akuntansi dasar: aset, kewajiban, ekuitas, serta konsep debit dan kredit yang harus diketahui oleh pelaku usaha F&B.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Memahami aset, kewajiban, dan ekuitas'],
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Belajar tentang debit dan kredit'],
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Mengenali pentingnya neraca keuangan'],
        ]);

        LessonResource::create([
            'lesson_id' => $lesson3->id,
            'title' => 'Ringkasan Dasar Akuntansi',
            'type' => 'PDF',
            'resource_link' => '/files/dasar_akuntansi.pdf',
        ]);

        $quiz3 = Quiz::create([
            'lesson_id' => $lesson3->id,
            'title' => 'Quiz: Basic Accounting Principles',
            'description' => 'Tes tentang konsep dasar akuntansi yang perlu dipahami pelaku usaha F&B.',
            'time_limit' => 12,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Aset dalam usaha biasanya adalah ...',
                'option_a' => 'Uang yang harus dibayar ke pemasok',
                'option_b' => 'Sumber daya yang dimiliki bisnis (mis. peralatan, kas)',
                'option_c' => 'Biaya sewa yang dibayar',
                'option_d' => 'Pendapatan dari penjualan',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Debit dan kredit digunakan untuk ...',
                'option_a' => 'Menambahkan dan mengurangi akun dalam pembukuan',
                'option_b' => 'Mengganti nama akun',
                'option_c' => 'Menentukan lokasi toko',
                'option_d' => 'Mengukur kualitas bahan',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Dokumen yang menunjukkan posisi keuangan (aset, kewajiban, ekuitas) disebut ...',
                'option_a' => 'Laporan laba rugi',
                'option_b' => 'Neraca (balance sheet)',
                'option_c' => 'Invoice',
                'option_d' => 'Katalog menu',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 4 - Revenue vs Profit
         */
        $lesson4 = Lesson::create([
            'module_id' => $module->id,
            'title' => 'Revenue vs Profit',
            'order_number' => 4,
            'duration' => '10 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson4->id,
            'type' => 'text',
            'content_link' => null,
            'description' => 'Pahami perbedaan antara pemasukan (revenue) dan laba (profit), serta pentingnya membedakan laba kotor dan laba bersih dalam menilai kesehatan usaha.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Definisi pendapatan dan laba'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Perbedaan laba kotor dan laba bersih'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Kesalahan umum dalam margin keuntungan'],
        ]);

        LessonResource::create([
            'lesson_id' => $lesson4->id,
            'title' => 'Panduan Pendapatan vs Laba',
            'type' => 'Doc',
            'resource_link' => '/files/pendapatan_vs_laba.docx',
        ]);

        $quiz4 = Quiz::create([
            'lesson_id' => $lesson4->id,
            'title' => 'Quiz: Revenue vs Profit',
            'description' => 'Uji pemahaman terkait perbedaan pendapatan dan laba serta margin keuntungan.',
            'time_limit' => 8,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Pendapatan (revenue) adalah ...',
                'option_a' => 'Jumlah uang yang masuk dari penjualan',
                'option_b' => 'Pengeluaran untuk bahan baku',
                'option_c' => 'Keuntungan bersih setelah pajak',
                'option_d' => 'Saldo bank pribadi pemilik',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Laba kotor berbeda dari laba bersih karena ...',
                'option_a' => 'Laba kotor sudah dikurangi pajak',
                'option_b' => 'Laba kotor hanya memperhitungkan HPP (harga pokok)',
                'option_c' => 'Laba bersih adalah pendapatan kotor',
                'option_d' => 'Tidak ada bedanya',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Kesalahan umum yang memengaruhi margin keuntungan adalah ...',
                'option_a' => 'Tidak menghitung HPP dengan benar',
                'option_b' => 'Mencatat transaksi secara teratur',
                'option_c' => 'Menggunakan template anggaran',
                'option_d' => 'Menyisihkan dana darurat',
                'correct_answer' => 'A',
            ],
        ]);

        /**
         * Lesson 5 - Creating Your First Budget
         */
        $lesson5 = Lesson::create([
            'module_id' => $module->id,
            'title' => 'Creating Your First Budget',
            'order_number' => 5,
            'duration' => '18 menit',
            'estimated_time' => '15-20 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson5->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/L1_SX54Xc3A',
            'description' => 'Pelajari cara menyusun anggaran sederhana: proyeksi pendapatan, membedakan biaya tetap dan variabel, serta menetapkan margin keuntungan dan dana darurat.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Memahami perbedaan biaya tetap dan variabel'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Membuat proyeksi pendapatan bulanan'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Mengelompokkan pengeluaran sesuai kategori'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Menetapkan margin laba dan target pertumbuhan'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Menyusun rencana darurat untuk pengeluaran tak terduga'],
        ]);

        LessonResource::insert([
            ['lesson_id' => $lesson5->id, 'title' => 'Template Anggaran F&B', 'type' => 'Excel', 'resource_link' => '/files/template_anggaran.xlsx'],
            ['lesson_id' => $lesson5->id, 'title' => 'Worksheet Perhitungan Biaya', 'type' => 'PDF', 'resource_link' => '/files/worksheet_biaya.pdf'],
        ]);

        $quiz5 = Quiz::create([
            'lesson_id' => $lesson5->id,
            'title' => 'Quiz: Creating Your First Budget',
            'description' => 'Tes pemahaman mengenai cara menyusun anggaran dan membedakan biaya.',
            'time_limit' => 12,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Biaya tetap (fixed costs) contohnya adalah ...',
                'option_a' => 'Biaya bahan per porsi',
                'option_b' => 'Sewa tempat',
                'option_c' => 'Biaya pembungkus per porsi',
                'option_d' => 'Gaji harian pegawai lepas',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Salah satu langkah dalam membuat proyeksi pendapatan bulanan adalah ...',
                'option_a' => 'Mengabaikan data penjualan sebelumnya',
                'option_b' => 'Menggunakan rata-rata penjualan bulan sebelumnya sebagai acuan',
                'option_c' => 'Menggandakan pengeluaran',
                'option_d' => 'Menentukan harga tanpa HPP',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Kenapa penting menyisihkan dana darurat?',
                'option_a' => 'Untuk membayar pajak pribadi saja',
                'option_b' => 'Untuk mengatasi pengeluaran tak terduga yang bisa merusak arus kas',
                'option_c' => 'Supaya bisa membeli peralatan mahal setiap minggu',
                'option_d' => 'Agar harga jual tetap tinggi',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 6 - Daily Expense Tracking
         */
        $lesson6 = Lesson::create([
            'module_id' => $module->id,
            'title' => 'Daily Expense Tracking',
            'order_number' => 6,
            'duration' => '7 menit',
            'estimated_time' => '5-10 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson6->id,
            'type' => 'text',
            'content_link' => null,
            'description' => 'Pelajari cara sederhana mencatat pengeluaran harian: konsistensi, pengkategorian, dan identifikasi pola pengeluaran berlebihan.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson6->id, 'takeaway' => 'Mencatat pengeluaran harian dengan konsisten'],
            ['lesson_id' => $lesson6->id, 'takeaway' => 'Mengategorikan pengeluaran dengan benar'],
            ['lesson_id' => $lesson6->id, 'takeaway' => 'Mengidentifikasi pola pengeluaran berlebihan'],
        ]);

        LessonResource::create([
            'lesson_id' => $lesson6->id,
            'title' => 'Tracker Pengeluaran Harian',
            'type' => 'Excel',
            'resource_link' => '/files/tracker_pengeluaran.xlsx',
        ]);

        $quiz6 = Quiz::create([
            'lesson_id' => $lesson6->id,
            'title' => 'Quiz: Daily Expense Tracking',
            'description' => 'Uji keterampilan mencatat dan mengelola pengeluaran harian secara konsisten.',
            'time_limit' => 8,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz6->id,
                'question' => 'Hal pertama yang harus dilakukan untuk mencatat pengeluaran harian adalah ...',
                'option_a' => 'Mencampur uang pribadi dan usaha',
                'option_b' => 'Mencatat setiap transaksi secara konsisten',
                'option_c' => 'Membuang bukti transaksi',
                'option_d' => 'Mengabaikan pengeluaran kecil',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz6->id,
                'question' => 'Mengategorikan pengeluaran membantu kita ...',
                'option_a' => 'Mengidentifikasi area pemborosan dan mengelola anggaran',
                'option_b' => 'Membuat menu lebih mahal',
                'option_c' => 'Menambah pengeluaran tanpa analisa',
                'option_d' => 'Mengurangi pemasukan',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz6->id,
                'question' => 'Pola pengeluaran berlebihan biasanya terlihat dari ...',
                'option_a' => 'Pencatatan yang rapi setiap hari',
                'option_b' => 'Kenaikan pengeluaran di kategori tertentu tanpa peningkatan penjualan',
                'option_c' => 'Penurunan stok bahan baku',
                'option_d' => 'Peningkatan pelanggan',
                'correct_answer' => 'B',
            ],
        ]);

        // === Tambahkan Default Progress (hanya untuk lesson pada modul ini) ===
        $user = User::first(); // ambil user pertama
        if ($user) {
            $moduleLessons = Lesson::where('module_id', $module->id)->get();
            foreach ($moduleLessons as $lesson) {
                UserLessonProgress::create([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                    'status' => 'Not Started',
                    'progress_percent' => 0,
                    'started_at' => null,
                    'completed_at' => null,
                ]);
            }
        }

        /**
         * Lesson 1 - Introduction to Digital Marketing
         */
        $lesson1 = Lesson::create([
            'module_id' => $module2->id,
            'title' => 'Introduction to Digital Marketing',
            'order_number' => 1,
            'duration' => '10 menit',
            'estimated_time' => '8-12 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson1->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ZgmVq2h38b8?si=dD-NWo8UWLof3ZEy',
            'description' => 'Pengenalan konsep digital marketing dalam bisnis F&B, serta mengapa strategi ini penting untuk UMKM.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Digital marketing adalah strategi menyeluruh, bukan sekadar promosi.'],
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Membantu UMKM membangun brand secara online.'],
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Meningkatkan visibilitas dan penjualan melalui platform digital.'],
        ]);

        $quiz1 = Quiz::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Quiz: Introduction to Digital Marketing',
            'description' => 'Tes pemahaman tentang pengertian digital marketing dalam bisnis F&B.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Apa fokus utama digital marketing untuk UMKM F&B?',
                'option_a' => 'Hanya memberikan diskon',
                'option_b' => 'Strategi menyeluruh membangun brand dan menjangkau konsumen online',
                'option_c' => 'Membuka cabang baru',
                'option_d' => 'Mengurangi biaya bahan baku',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Mengapa banyak UMKM salah kaprah soal marketing?',
                'option_a' => 'Menganggap marketing hanya promosi/diskon',
                'option_b' => 'Karena selalu pakai konsultan',
                'option_c' => 'Karena hanya pakai marketplace',
                'option_d' => 'Tidak butuh strategi sama sekali',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Salah satu manfaat digital marketing adalah ...',
                'option_a' => 'Mengurangi pajak bisnis',
                'option_b' => 'Meningkatkan visibilitas dan penjualan',
                'option_c' => 'Mengurangi jam operasional',
                'option_d' => 'Menghapus kebutuhan karyawan',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 2 - Why Digital Marketing Matters
         */
        $lesson2 = Lesson::create([
            'module_id' => $module2->id,
            'title' => 'Why Digital Marketing Matters',
            'order_number' => 2,
            'duration' => '12 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson2->id,
            'type' => 'text',
            'content_link' => null,
            'description' => 'Mengapa digital marketing menjadi penting bagi bisnis F&B, mulai dari efisiensi biaya hingga kemudahan interaksi dengan konsumen.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Membantu produk mudah ditemukan pelanggan baru.'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Menjadi sarana komunikasi langsung dengan konsumen.'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Lebih efisien biaya dibanding iklan tradisional.'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Hasil bisa diukur (engagement, reach, conversion).'],
        ]);

        $quiz2 = Quiz::create([
            'lesson_id' => $lesson2->id,
            'title' => 'Quiz: Why Digital Marketing Matters',
            'description' => 'Tes pemahaman tentang pentingnya digital marketing untuk F&B.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Salah satu alasan digital marketing lebih unggul dibanding offline adalah ...',
                'option_a' => 'Hanya untuk usaha besar',
                'option_b' => 'Hasilnya bisa diukur secara jelas',
                'option_c' => 'Lebih mahal dibanding brosur',
                'option_d' => 'Tidak bisa berinteraksi dengan konsumen',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Digital marketing membantu produk ...',
                'option_a' => 'Mudah ditemukan pelanggan baru',
                'option_b' => 'Sulit dijangkau konsumen',
                'option_c' => 'Hanya dikenal tetangga sekitar',
                'option_d' => 'Lebih mahal untuk dipromosikan',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Manfaat komunikasi langsung dengan konsumen melalui digital marketing adalah ...',
                'option_a' => 'Bisa langsung dapat feedback',
                'option_b' => 'Menambah biaya promosi',
                'option_c' => 'Mengurangi followers',
                'option_d' => 'Menyulitkan interaksi',
                'correct_answer' => 'A',
            ],
        ]);

        /**
         * Lesson 3 - Digital vs Offline Promotion
         */
        $lesson3 = Lesson::create([
            'module_id' => $module2->id,
            'title' => 'Digital vs Offline Promotion',
            'order_number' => 3,
            'duration' => '10 menit',
            'estimated_time' => '8-12 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson3->id,
            'type' => 'text',
            'content_link' => null,
            'description' => 'Bandingkan digital marketing dengan promosi offline, dan bagaimana kombinasi keduanya bisa memberi hasil maksimal.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Digital marketing fokus pada online presence (sosial media, marketplace).'],
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Promosi offline terbatas pada brosur, spanduk, event lokal.'],
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Kombinasi digital + offline lebih efektif.'],
        ]);

        $quiz3 = Quiz::create([
            'lesson_id' => $lesson3->id,
            'title' => 'Quiz: Digital vs Offline Promotion',
            'description' => 'Tes pemahaman perbedaan promosi digital dan offline.',
            'time_limit' => 8,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Contoh promosi offline adalah ...',
                'option_a' => 'Instagram Ads',
                'option_b' => 'Spanduk di jalan',
                'option_c' => 'ShopeeFood',
                'option_d' => 'WhatsApp Business',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Fokus utama digital marketing adalah ...',
                'option_a' => 'Online presence di media sosial, marketplace, website',
                'option_b' => 'Bagi brosur di sekitar toko',
                'option_c' => 'Membuka stand pameran',
                'option_d' => 'Memberi sampel gratis',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Menggabungkan promosi online dan offline akan ...',
                'option_a' => 'Memboroskan biaya',
                'option_b' => 'Menghasilkan jangkauan yang maksimal',
                'option_c' => 'Tidak ada manfaatnya',
                'option_d' => 'Mengurangi pelanggan',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 4 - Main Digital Marketing Channels
         */
        $lesson4 = Lesson::create([
            'module_id' => $module2->id,
            'title' => 'Main Digital Marketing Channels',
            'order_number' => 4,
            'duration' => '15 menit',
            'estimated_time' => '12-18 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson4->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ZgmVq2h38b8?si=dD-NWo8UWLof3ZEy',
            'description' => 'Kenali kanal utama digital marketing untuk UMKM F&B: media sosial, WhatsApp Business, marketplace, hingga iklan berbayar.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Media sosial penting untuk konten foto/video.'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'WhatsApp Business untuk komunikasi langsung.'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Marketplace & delivery apps memperluas jangkauan.'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Iklan berbayar membantu target audiens spesifik.'],
        ]);

        $quiz4 = Quiz::create([
            'lesson_id' => $lesson4->id,
            'title' => 'Quiz: Main Digital Marketing Channels',
            'description' => 'Tes pemahaman tentang kanal utama digital marketing untuk F&B.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Media sosial seperti Instagram & TikTok berfungsi untuk ...',
                'option_a' => 'Mengelola stok bahan baku',
                'option_b' => 'Membuat konten produk yang menarik',
                'option_c' => 'Mengurangi pajak usaha',
                'option_d' => 'Mengatur shift karyawan',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz4->id,
                'question' => 'WhatsApp Business dapat digunakan untuk ...',
                'option_a' => 'Katalog produk dan komunikasi langsung',
                'option_b' => 'Membuat laporan keuangan',
                'option_c' => 'Mengatur jadwal kerja',
                'option_d' => 'Membuat logo bisnis',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz4->id,
                'question' => 'GoFood, GrabFood, ShopeeFood termasuk dalam kategori ...',
                'option_a' => 'Marketplace & delivery apps',
                'option_b' => 'Promosi offline',
                'option_c' => 'Iklan berbayar',
                'option_d' => 'Kanal personal branding',
                'correct_answer' => 'A',
            ],
        ]);

        /**
         * Lesson 5 - Effective Content Strategies
         */
        $lesson5 = Lesson::create([
            'module_id' => $module2->id,
            'title' => 'Effective Content Strategies',
            'order_number' => 5,
            'duration' => '15 menit',
            'estimated_time' => '12-18 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson5->id,
            'type' => 'text',
            'content_link' => null,
            'description' => 'Strategi konten yang efektif untuk UMKM F&B, mulai dari storytelling, testimoni, hingga promo kreatif.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Konten berkualitas (foto/video) meningkatkan daya tarik.'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Storytelling membangun hubungan emosional dengan pelanggan.'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Testimoni pelanggan penting sebagai social proof.'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Promo kreatif sesuai momen meningkatkan engagement.'],
        ]);

        $quiz5 = Quiz::create([
            'lesson_id' => $lesson5->id,
            'title' => 'Quiz: Effective Content Strategies',
            'description' => 'Tes pemahaman tentang strategi konten digital marketing.',
            'time_limit' => 12,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Storytelling brand digunakan untuk ...',
                'option_a' => 'Membangun hubungan emosional dengan pelanggan',
                'option_b' => 'Mengurangi biaya iklan',
                'option_c' => 'Mengatur jadwal karyawan',
                'option_d' => 'Membatasi promosi',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Testimoni pelanggan berfungsi sebagai ...',
                'option_a' => 'Social proof',
                'option_b' => 'Pengeluaran tambahan',
                'option_c' => 'Konten hiburan saja',
                'option_d' => 'Pajak tambahan',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Promo kreatif sebaiknya dibuat ...',
                'option_a' => 'Tanpa memperhatikan momen',
                'option_b' => 'Sesuai momen tertentu (Ramadhan, Tahun Baru, dll)',
                'option_c' => 'Setiap hari dengan harga berbeda',
                'option_d' => 'Untuk mengurangi jumlah pelanggan',
                'correct_answer' => 'B',
            ],
        ]);

        // === Default Progress untuk user pertama ===
        $user = User::first();
        if ($user) {
            $moduleLessons = Lesson::where('module_id', $module2->id)->get();
            foreach ($moduleLessons as $lesson) {
                UserLessonProgress::create([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                    'status' => 'Not Started',
                    'progress_percent' => 0,
                    'started_at' => null,
                    'completed_at' => null,
                ]);
            }
        }

        /**
         * Lesson 1 - Introduction to Food Costing & Pricing
         */
        $lesson1 = Lesson::create([
            'module_id' => $module3->id,
            'title' => 'Introduction to Food Costing & Pricing',
            'order_number' => 1,
            'duration' => '10 menit',
            'estimated_time' => '8-12 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson1->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ItpDXZQcZ9o?si=sGV4tClfHDbFugeg',
            'description' => 'Pengenalan konsep food costing & pricing untuk bisnis F&B, serta pentingnya menghitung HPP sebelum menentukan harga jual.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Banyak UMKM masih menentukan harga berdasarkan perkiraan.'],
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Food costing membantu menghindari kerugian akibat salah harga.'],
            ['lesson_id' => $lesson1->id, 'takeaway' => 'Harga harus kompetitif dan tetap menguntungkan.'],
        ]);

        $quiz1 = Quiz::create([
            'lesson_id' => $lesson1->id,
            'title' => 'Quiz: Introduction to Food Costing & Pricing',
            'description' => 'Tes pemahaman dasar food costing & pricing.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Mengapa food costing penting dalam bisnis F&B?',
                'option_a' => 'Untuk menentukan ukuran porsi',
                'option_b' => 'Untuk memastikan harga jual tepat dan menguntungkan',
                'option_c' => 'Untuk menambah menu baru',
                'option_d' => 'Untuk mengurangi pajak usaha',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Apa yang sering dilakukan UMKM dalam menentukan harga?',
                'option_a' => 'Menghitung biaya detail',
                'option_b' => 'Meniru kompetitor atau perkiraan saja',
                'option_c' => 'Menggunakan software akuntansi',
                'option_d' => 'Mengacu pada standar internasional',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz1->id,
                'question' => 'Kesalahan harga bisa menyebabkan ...',
                'option_a' => 'Meningkatnya penjualan',
                'option_b' => 'Kerugian atau produk tidak laku',
                'option_c' => 'Kualitas makanan lebih baik',
                'option_d' => 'Pelanggan semakin loyal',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 2 - Understanding Food Costing
         */
        $lesson2 = Lesson::create([
            'module_id' => $module3->id,
            'title' => 'Understanding Food Costing',
            'order_number' => 2,
            'duration' => '12 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson2->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ItpDXZQcZ9o?si=sGV4tClfHDbFugeg',
            'description' => 'Food costing adalah total biaya membuat satu porsi produk, termasuk bahan baku, bumbu, dan kemasan.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Food costing = total biaya untuk 1 porsi produk.'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Termasuk bahan baku, bumbu, kemasan.'],
            ['lesson_id' => $lesson2->id, 'takeaway' => 'Menjadi dasar penetapan harga jual.'],
        ]);

        $quiz2 = Quiz::create([
            'lesson_id' => $lesson2->id,
            'title' => 'Quiz: Understanding Food Costing',
            'description' => 'Tes pemahaman tentang food costing.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Apa itu food costing?',
                'option_a' => 'Harga jual produk',
                'option_b' => 'Total biaya untuk membuat satu porsi produk',
                'option_c' => 'Margin keuntungan bersih',
                'option_d' => 'Biaya sewa tempat usaha',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Komponen apa yang termasuk dalam food costing?',
                'option_a' => 'Bahan baku, bumbu, kemasan',
                'option_b' => 'Iklan dan promosi',
                'option_c' => 'Biaya sewa gedung',
                'option_d' => 'Gaji karyawan',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz2->id,
                'question' => 'Food costing digunakan untuk ...',
                'option_a' => 'Menentukan harga jual',
                'option_b' => 'Membuat resep baru',
                'option_c' => 'Mengurangi biaya transportasi',
                'option_d' => 'Meningkatkan gaji karyawan',
                'correct_answer' => 'A',
            ],
        ]);

        /**
         * Lesson 3 - Calculating HPP
         */
        $lesson3 = Lesson::create([
            'module_id' => $module3->id,
            'title' => 'Calculating HPP',
            'order_number' => 3,
            'duration' => '15 menit',
            'estimated_time' => '12-18 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson3->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ItpDXZQcZ9o?si=sGV4tClfHDbFugeg',
            'description' => 'HPP dihitung dengan menjumlahkan seluruh biaya bahan baku, takaran per porsi, dan biaya kemasan.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson3->id, 'takeaway' => 'HPP = total biaya bahan baku + kemasan.'],
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Harus detail dengan daftar bahan dan harga.'],
            ['lesson_id' => $lesson3->id, 'takeaway' => 'Dasar untuk menentukan margin keuntungan.'],
        ]);

        $quiz3 = Quiz::create([
            'lesson_id' => $lesson3->id,
            'title' => 'Quiz: Calculating HPP',
            'description' => 'Tes pemahaman cara menghitung HPP.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Langkah pertama menghitung HPP adalah ...',
                'option_a' => 'Menentukan margin keuntungan',
                'option_b' => 'Membuat daftar bahan baku lengkap dengan harga & takaran',
                'option_c' => 'Membandingkan harga kompetitor',
                'option_d' => 'Mencetak brosur promosi',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz3->id,
                'question' => 'Komponen yang sering dilupakan dalam HPP adalah ...',
                'option_a' => 'Biaya kemasan',
                'option_b' => 'Gaji karyawan',
                'option_c' => 'Biaya listrik',
                'option_d' => 'Biaya iklan',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz3->id,
                'question' => 'HPP produk menunjukkan ...',
                'option_a' => 'Harga jual final',
                'option_b' => 'Total biaya produksi per porsi',
                'option_c' => 'Keuntungan bersih',
                'option_d' => 'Pajak usaha',
                'correct_answer' => 'B',
            ],
        ]);

        /**
         * Lesson 4 - Setting the Right Selling Price
         */
        $lesson4 = Lesson::create([
            'module_id' => $module3->id,
            'title' => 'Setting the Right Selling Price',
            'order_number' => 4,
            'duration' => '15 menit',
            'estimated_time' => '12-18 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson4->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ItpDXZQcZ9o?si=sGV4tClfHDbFugeg',
            'description' => 'Cara menentukan harga jual dengan menambahkan margin keuntungan pada HPP, serta menyesuaikan daya beli pasar.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Harga jual = HPP + Margin Keuntungan.'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Margin umum 30–50% untuk produk F&B.'],
            ['lesson_id' => $lesson4->id, 'takeaway' => 'Harga harus sesuai daya beli target pasar.'],
        ]);

        $quiz4 = Quiz::create([
            'lesson_id' => $lesson4->id,
            'title' => 'Quiz: Setting the Right Selling Price',
            'description' => 'Tes pemahaman cara menentukan harga jual.',
            'time_limit' => 10,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Berapa margin keuntungan umum di bisnis F&B?',
                'option_a' => '5–10%',
                'option_b' => '15–20%',
                'option_c' => '30–50%',
                'option_d' => '70–90%',
                'correct_answer' => 'C',
            ],
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Rumus sederhana menentukan harga jual adalah ...',
                'option_a' => 'Harga Jual = HPP + Margin Keuntungan',
                'option_b' => 'Harga Jual = HPP – Margin Keuntungan',
                'option_c' => 'Harga Jual = Margin ÷ HPP',
                'option_d' => 'Harga Jual = HPP saja',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz4->id,
                'question' => 'Selain margin, apa yang perlu diperhatikan dalam menentukan harga?',
                'option_a' => 'Daya beli target pasar',
                'option_b' => 'Jumlah kompetitor',
                'option_c' => 'Jumlah karyawan',
                'option_d' => 'Biaya iklan',
                'correct_answer' => 'A',
            ],
        ]);

        /**
         * Lesson 5 - Tips for Maintaining Profitability
         */
        $lesson5 = Lesson::create([
            'module_id' => $module3->id,
            'title' => 'Tips for Maintaining Profitability',
            'order_number' => 5,
            'duration' => '15 menit',
            'estimated_time' => '12-18 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson5->id,
            'type' => 'video',
            'content_link' => 'https://www.youtube.com/embed/ItpDXZQcZ9o?si=sGV4tClfHDbFugeg',
            'description' => 'Tips menjaga profitabilitas seperti update harga bahan, kontrol takaran resep, dan perhatikan tren pasar.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Update harga bahan secara berkala.'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Gunakan standar resep untuk konsistensi.'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Hindari pemborosan bahan.'],
            ['lesson_id' => $lesson5->id, 'takeaway' => 'Ikuti tren harga pasar agar tetap kompetitif.'],
        ]);

        $quiz5 = Quiz::create([
            'lesson_id' => $lesson5->id,
            'title' => 'Quiz: Tips for Maintaining Profitability',
            'description' => 'Tes pemahaman strategi menjaga profitabilitas.',
            'time_limit' => 12,
            'total_questions' => 3,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Mengapa harga bahan baku harus di-update secara berkala?',
                'option_a' => 'Untuk menyesuaikan dengan biaya aktual',
                'option_b' => 'Agar bisa menambah menu baru',
                'option_c' => 'Untuk mengurangi pajak',
                'option_d' => 'Supaya pelanggan makin banyak',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Standar resep membantu ...',
                'option_a' => 'Konsistensi takaran & biaya',
                'option_b' => 'Menambah variasi rasa',
                'option_c' => 'Mengurangi harga jual',
                'option_d' => 'Membuat promosi',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz5->id,
                'question' => 'Mengikuti tren harga pasar penting karena ...',
                'option_a' => 'Membuat produk tetap kompetitif',
                'option_b' => 'Mengurangi biaya kemasan',
                'option_c' => 'Menambah pajak',
                'option_d' => 'Menghilangkan kompetitor',
                'correct_answer' => 'A',
            ],
        ]);

        // === Default Progress untuk user pertama ===
        $user = User::first();
        if ($user) {
            $moduleLessons = Lesson::where('module_id', $module3->id)->get();
            foreach ($moduleLessons as $lesson) {
                UserLessonProgress::create([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                    'status' => 'Not Started',
                    'progress_percent' => 0,
                    'started_at' => null,
                    'completed_at' => null,
                ]);
            }
        }

        // Lesson 1
        $lesson41 = Lesson::create([
            'module_id' => $module4->id,
            'title' => 'Mengapa Customer Service Penting',
            'order_number' => 1,
            'duration' => '10 menit',
            'estimated_time' => '5-10 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson41->id,
            'type' => 'text',
            'description' => 'Membahas alasan mengapa pelayanan pelanggan berperan penting dalam bisnis F&B.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson41->id, 'takeaway' => 'Menciptakan pengalaman menyenangkan bagi pelanggan'],
            ['lesson_id' => $lesson41->id, 'takeaway' => 'Membangun loyalitas dan repeat order'],
            ['lesson_id' => $lesson41->id, 'takeaway' => 'Menjadi pembeda dari kompetitor'],
        ]);

        $quiz41 = Quiz::create([
            'lesson_id' => $lesson41->id,
            'title' => 'Quiz: Pentingnya Customer Service',
            'description' => 'Tes pemahaman tentang pentingnya pelayanan pelanggan.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz41->id,
                'question' => 'Mengapa customer service penting dalam bisnis F&B?',
                'option_a' => 'Untuk menghitung HPP',
                'option_b' => 'Untuk menciptakan pengalaman menyenangkan pelanggan',
                'option_c' => 'Untuk membuat menu baru',
                'option_d' => 'Untuk mencari supplier',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz41->id,
                'question' => 'Apa dampak pelayanan yang baik terhadap pelanggan?',
                'option_a' => 'Meningkatkan loyalitas dan repeat order',
                'option_b' => 'Mengurangi biaya produksi',
                'option_c' => 'Membuat kompetitor kalah otomatis',
                'option_d' => 'Menambah karyawan baru',
                'correct_answer' => 'A',
            ],
        ]);

        // Lesson 2
        $lesson42 = Lesson::create([
            'module_id' => $module4->id,
            'title' => 'Prinsip Dasar Pelayanan Pelanggan',
            'order_number' => 2,
            'duration' => '12 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson42->id,
            'type' => 'text',
            'description' => 'Memahami prinsip dasar interaksi dengan pelanggan dalam F&B.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson42->id, 'takeaway' => 'Ramah dan sopan'],
            ['lesson_id' => $lesson42->id, 'takeaway' => 'Respon cepat terhadap pertanyaan'],
            ['lesson_id' => $lesson42->id, 'takeaway' => 'Konsistensi kualitas pelayanan'],
        ]);

        $quiz42 = Quiz::create([
            'lesson_id' => $lesson42->id,
            'title' => 'Quiz: Prinsip Dasar Customer Service',
            'description' => 'Tes pemahaman tentang prinsip dasar pelayanan pelanggan.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz42->id,
                'question' => 'Prinsip dasar apa yang harus ada dalam customer service?',
                'option_a' => 'Ramah, respon cepat, konsistensi',
                'option_b' => 'Murah, cepat, banyak promo',
                'option_c' => 'Diskon, voucher, hadiah',
                'option_d' => 'Sibuk, cuek, formal',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz42->id,
                'question' => 'Kenapa empati penting dalam customer service?',
                'option_a' => 'Agar pelanggan merasa didengar dan dihargai',
                'option_b' => 'Agar produk lebih cepat laku',
                'option_c' => 'Agar biaya lebih murah',
                'option_d' => 'Agar karyawan lebih sedikit',
                'correct_answer' => 'A',
            ],
        ]);

        // Lesson 3
        $lesson43 = Lesson::create([
            'module_id' => $module4->id,
            'title' => 'Menangani Komplain dan Meningkatkan Customer Experience',
            'order_number' => 3,
            'duration' => '15 menit',
            'estimated_time' => '15-20 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson43->id,
            'type' => 'text',
            'description' => 'Strategi menghadapi komplain dan meningkatkan pengalaman pelanggan.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson43->id, 'takeaway' => 'Dengarkan keluhan dengan empati'],
            ['lesson_id' => $lesson43->id, 'takeaway' => 'Berikan solusi praktis'],
            ['lesson_id' => $lesson43->id, 'takeaway' => 'Customer experience yang positif meningkatkan loyalitas'],
        ]);

        $quiz43 = Quiz::create([
            'lesson_id' => $lesson43->id,
            'title' => 'Quiz: Menangani Komplain dan CX',
            'description' => 'Tes pemahaman tentang cara menghadapi komplain pelanggan.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz43->id,
                'question' => 'Langkah pertama saat menangani komplain pelanggan?',
                'option_a' => 'Memberikan diskon',
                'option_b' => 'Langsung menyalahkan karyawan',
                'option_c' => 'Dengarkan tanpa menyela',
                'option_d' => 'Menolak keluhan',
                'correct_answer' => 'C',
            ],
            [
                'quiz_id' => $quiz43->id,
                'question' => 'Apa yang bisa meningkatkan customer experience?',
                'option_a' => 'Promo spesial, ucapan terima kasih, komunikasi mudah',
                'option_b' => 'Harga dinaikkan',
                'option_c' => 'Produk dikurangi',
                'option_d' => 'Mengabaikan keluhan',
                'correct_answer' => 'A',
            ],
        ]);

        // === Tambahkan Default Progress ===
        $user = User::first();
        if ($user) {
            foreach (Lesson::all() as $lesson) {
                UserLessonProgress::firstOrCreate([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                ], [
                    'status' => 'Not Started',
                    'progress_percent' => 0,
                    'started_at' => null,
                    'completed_at' => null,
                ]);
            }
        }

                /**
         * =============================
         * Modul 5 - Menu Innovation Strategies
         * =============================
         */

        // Lesson 1
        $lesson51 = Lesson::create([
            'module_id' => $module5->id,
            'title' => 'Mengapa Inovasi Menu Penting',
            'order_number' => 1,
            'duration' => '10 menit',
            'estimated_time' => '5-10 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson51->id,
            'type' => 'text',
            'description' => 'Membahas pentingnya inovasi menu untuk menarik pelanggan baru dan menjaga loyalitas pelanggan lama.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson51->id, 'takeaway' => 'Menarik pelanggan baru'],
            ['lesson_id' => $lesson51->id, 'takeaway' => 'Menjaga antusiasme pelanggan lama'],
            ['lesson_id' => $lesson51->id, 'takeaway' => 'Meningkatkan peluang penjualan melalui menu musiman'],
        ]);

        $quiz51 = Quiz::create([
            'lesson_id' => $lesson51->id,
            'title' => 'Quiz: Pentingnya Inovasi Menu',
            'description' => 'Tes pemahaman tentang pentingnya inovasi menu.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz51->id,
                'question' => 'Mengapa inovasi menu penting bagi bisnis F&B?',
                'option_a' => 'Agar harga bisa lebih mahal',
                'option_b' => 'Menarik pelanggan baru dan menjaga loyalitas',
                'option_c' => 'Untuk mengurangi jumlah pegawai',
                'option_d' => 'Untuk menghitung HPP',
                'correct_answer' => 'B',
            ],
            [
                'quiz_id' => $quiz51->id,
                'question' => 'Apa salah satu manfaat menu musiman?',
                'option_a' => 'Membuat kompetitor rugi',
                'option_b' => 'Meningkatkan peluang penjualan',
                'option_c' => 'Mengurangi jumlah menu',
                'option_d' => 'Mengurangi kebutuhan supplier',
                'correct_answer' => 'B',
            ],
        ]);

        // Lesson 2
        $lesson52 = Lesson::create([
            'module_id' => $module5->id,
            'title' => 'Sumber Inspirasi Menu Baru',
            'order_number' => 2,
            'duration' => '12 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson52->id,
            'type' => 'text',
            'description' => 'Pelajari berbagai sumber inspirasi dalam membuat menu baru.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson52->id, 'takeaway' => 'Tren makanan dari media sosial'],
            ['lesson_id' => $lesson52->id, 'takeaway' => 'Feedback pelanggan'],
            ['lesson_id' => $lesson52->id, 'takeaway' => 'Bahan lokal yang unik'],
        ]);

        $quiz52 = Quiz::create([
            'lesson_id' => $lesson52->id,
            'title' => 'Quiz: Inspirasi Menu Baru',
            'description' => 'Tes pemahaman tentang sumber ide menu baru.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz52->id,
                'question' => 'Apa salah satu sumber inspirasi menu baru?',
                'option_a' => 'Feedback pelanggan',
                'option_b' => 'Harga bahan baku',
                'option_c' => 'Jumlah pegawai',
                'option_d' => 'Ukuran restoran',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz52->id,
                'question' => 'Mengapa bahan lokal bisa jadi inspirasi menu?',
                'option_a' => 'Karena lebih mahal',
                'option_b' => 'Karena unik dan sesuai identitas brand',
                'option_c' => 'Karena bisa mengurangi kualitas',
                'option_d' => 'Karena tidak perlu inovasi',
                'correct_answer' => 'B',
            ],
        ]);

        // Lesson 3
        $lesson53 = Lesson::create([
            'module_id' => $module5->id,
            'title' => 'Strategi Mengembangkan Menu',
            'order_number' => 3,
            'duration' => '15 menit',
            'estimated_time' => '15-20 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson53->id,
            'type' => 'text',
            'description' => 'Strategi dalam mengembangkan dan menguji menu baru sebelum diluncurkan besar-besaran.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson53->id, 'takeaway' => 'Modifikasi menu lama'],
            ['lesson_id' => $lesson53->id, 'takeaway' => 'Gunakan uji coba terbatas'],
            ['lesson_id' => $lesson53->id, 'takeaway' => 'Pastikan harga kompetitif'],
        ]);

        $quiz53 = Quiz::create([
            'lesson_id' => $lesson53->id,
            'title' => 'Quiz: Strategi Mengembangkan Menu',
            'description' => 'Tes pemahaman tentang strategi inovasi menu.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz53->id,
                'question' => 'Apa tujuan uji coba terbatas pada menu baru?',
                'option_a' => 'Mengurangi risiko kegagalan',
                'option_b' => 'Menambah biaya promosi',
                'option_c' => 'Mengurangi variasi menu',
                'option_d' => 'Meningkatkan harga',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz53->id,
                'question' => 'Apa yang harus dijaga agar inovasi menu sukses?',
                'option_a' => 'Kualitas, konsistensi, relevansi brand',
                'option_b' => 'Harga murah saja',
                'option_c' => 'Jumlah menu sebanyak mungkin',
                'option_d' => 'Tidak ada promosi',
                'correct_answer' => 'A',
            ],
        ]);

        /**
         * =============================
         * Modul 6 - Supply Chain Management
         * =============================
         */

        // Lesson 1
        $lesson61 = Lesson::create([
            'module_id' => $module6->id,
            'title' => 'Mengapa Supply Chain Penting',
            'order_number' => 1,
            'duration' => '10 menit',
            'estimated_time' => '5-10 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson61->id,
            'type' => 'text',
            'description' => 'Memahami pentingnya supply chain dalam menjaga ketersediaan bahan baku dan kualitas produk.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson61->id, 'takeaway' => 'Menjamin ketersediaan bahan baku'],
            ['lesson_id' => $lesson61->id, 'takeaway' => 'Menjaga kualitas produk'],
            ['lesson_id' => $lesson61->id, 'takeaway' => 'Mengurangi risiko kekosongan stok'],
        ]);

        $quiz61 = Quiz::create([
            'lesson_id' => $lesson61->id,
            'title' => 'Quiz: Pentingnya Supply Chain',
            'description' => 'Tes pemahaman tentang pentingnya supply chain.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz61->id,
                'question' => 'Apa fungsi utama supply chain dalam bisnis F&B?',
                'option_a' => 'Menjamin ketersediaan bahan baku',
                'option_b' => 'Menentukan desain logo',
                'option_c' => 'Menambah jumlah karyawan',
                'option_d' => 'Mengurangi menu',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz61->id,
                'question' => 'Apa dampak supply chain yang buruk?',
                'option_a' => 'Produksi terganggu dan pelanggan kecewa',
                'option_b' => 'Harga bahan turun',
                'option_c' => 'Jumlah pegawai meningkat',
                'option_d' => 'Menu menjadi lebih banyak',
                'correct_answer' => 'A',
            ],
        ]);

        // Lesson 2
        $lesson62 = Lesson::create([
            'module_id' => $module6->id,
            'title' => 'Memilih Supplier yang Tepat',
            'order_number' => 2,
            'duration' => '12 menit',
            'estimated_time' => '10-15 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson62->id,
            'type' => 'text',
            'description' => 'Cara memilih supplier yang tepat untuk menjaga kualitas dan kelancaran supply chain.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson62->id, 'takeaway' => 'Kualitas bahan stabil'],
            ['lesson_id' => $lesson62->id, 'takeaway' => 'Keandalan pengiriman'],
            ['lesson_id' => $lesson62->id, 'takeaway' => 'Hubungan jangka panjang'],
        ]);

        $quiz62 = Quiz::create([
            'lesson_id' => $lesson62->id,
            'title' => 'Quiz: Memilih Supplier',
            'description' => 'Tes pemahaman tentang pemilihan supplier yang tepat.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz62->id,
                'question' => 'Apa yang harus diperhatikan dalam memilih supplier?',
                'option_a' => 'Kualitas bahan, harga, keandalan',
                'option_b' => 'Jumlah karyawan supplier',
                'option_c' => 'Desain logo supplier',
                'option_d' => 'Warna kemasan produk',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz62->id,
                'question' => 'Mengapa hubungan jangka panjang penting dengan supplier?',
                'option_a' => 'Untuk mendapatkan harga stabil dan pasokan terjamin',
                'option_b' => 'Untuk memperbanyak menu',
                'option_c' => 'Untuk mengurangi biaya listrik',
                'option_d' => 'Untuk menambah karyawan',
                'correct_answer' => 'A',
            ],
        ]);

        // Lesson 3
        $lesson63 = Lesson::create([
            'module_id' => $module6->id,
            'title' => 'Strategi Manajemen Persediaan',
            'order_number' => 3,
            'duration' => '15 menit',
            'estimated_time' => '15-20 menit',
            'status' => 'Not Started',
        ]);

        LessonContent::create([
            'lesson_id' => $lesson63->id,
            'type' => 'text',
            'description' => 'Strategi mengelola persediaan agar efisien dan tidak menimbulkan kerugian.',
        ]);

        LessonTakeaway::insert([
            ['lesson_id' => $lesson63->id, 'takeaway' => 'Gunakan pencatatan stok sederhana'],
            ['lesson_id' => $lesson63->id, 'takeaway' => 'Terapkan metode FIFO'],
            ['lesson_id' => $lesson63->id, 'takeaway' => 'Siapkan supplier cadangan'],
        ]);

        $quiz63 = Quiz::create([
            'lesson_id' => $lesson63->id,
            'title' => 'Quiz: Manajemen Persediaan',
            'description' => 'Tes pemahaman tentang strategi manajemen persediaan.',
            'time_limit' => 10,
            'total_questions' => 2,
        ]);

        QuizQuestion::insert([
            [
                'quiz_id' => $quiz63->id,
                'question' => 'Apa tujuan metode FIFO dalam manajemen persediaan?',
                'option_a' => 'Agar bahan lama dipakai lebih dulu',
                'option_b' => 'Agar bahan baru selalu dipakai',
                'option_c' => 'Untuk menambah biaya operasional',
                'option_d' => 'Untuk mengurangi kualitas produk',
                'correct_answer' => 'A',
            ],
            [
                'quiz_id' => $quiz63->id,
                'question' => 'Mengapa supplier cadangan penting?',
                'option_a' => 'Untuk berjaga-jaga jika ada keterlambatan pasokan',
                'option_b' => 'Untuk menambah jumlah menu',
                'option_c' => 'Untuk memperluas area restoran',
                'option_d' => 'Untuk mengurangi kebutuhan promosi',
                'correct_answer' => 'A',
            ],
        ]);
    }
}
