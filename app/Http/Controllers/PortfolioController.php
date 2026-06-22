<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Yusuf Maulana',
            'judul' => 'Web Developer & IT Technician',
            'email' => 'ull4775@gmail.com',
            'telepon' => '+6285134240901',
            'alamat' => 'Bandung Jawa Barat',
            'tentang' => 'Membantu bisnis dan individu memanfaatkan teknologi secara optimal adalah passion saya. Sebagai Developer dan Teknisi IT yang berpengalaman, saya menyediakan layanan pengembangan website serta dukungan teknis komputer yang andal. Setiap solusi dirancang dengan fokus pada kualitas, performa, dan kemudahan penggunaan, sehingga mampu memberikan manfaat nyata bagi kebutuhan Anda.',
            'pendidikan' => [
                // [
                //     'sekolah' => 'Universitas Teknologi Indonesia',
                //     'jurusan' => 'S1 Teknik Informatika',
                //     'tahun' => '2019 - 2023',
                //     'ipk' => '3.75'
                // ],
                [
                    'sekolah' => 'Lususan SMK Azzainiyyah',
                    'jurusan' => 'Rekayasa Perangkat Lunak',
                    'tahun' => '2023 - 2026',
                    // 'ipk' => '90.5'
                ]
            ],
            'keahlian' => [
                ['nama' => 'Laravel/PHP', 'level' => 90],
                ['nama' => 'JavaScript/Vue.js', 'level' => 85],
                ['nama' => 'MySQL/Database', 'level' => 88],
                ['nama' => 'HTML/CSS/Bootstrap', 'level' => 95],
                ['nama' => 'Hardware & Networking', 'level' => 80],
                ['nama' => 'CCTV Installation', 'level' => 80],
                ['nama' => 'Laptop Repair', 'level' => 90],
                ['nama' => 'Linux Server', 'level' => 75],
            ],
            'pengalaman' => [
                [
                    'posisi' => 'Pusat Sistem Informasi Pelayanan & IT Support',
                    'perusahaan' => 'Perumda Air Minum Tirta Wibawa Kotasmi',
                    'tahun' => '2025',
                    'deskripsi' => 'Mengembangkan aplikasi web menggunakan Laravel dan Vue.js untuk berbagai klien enterprise.'
                ],
                // [
                //     'posisi' => 'IT Support & Technician',
                //     'perusahaan' => 'CV Tech Solution',
                //     'tahun' => '2021 - 2023',
                //     'deskripsi' => 'Menangani perbaikan hardware, instalasi jaringan, dan pemasangan CCTV untuk klien korporat.'
                // ],
                // [
                //     'posisi' => 'Freelance Web Developer',
                //     'perusahaan' => 'Self Employed',
                //     'tahun' => '2020 - 2021',
                //     'deskripsi' => 'Membuat website company profile, e-commerce, dan sistem informasi untuk UMKM.'
                // ]
            ],
            'sertifikat' => [
                ['nama' => 'Piagam Penghargaan Atas Project Website Terbaik', 'institusi' => 'Uji Kompetensi Keahlian Rekayasa Perangkat Lunak Smk Azzainiyyah', 'tahun' => '2026'],
                ['nama' => 'Uji Kompetensi keahlian Terbaik', 'institusi' => 'Uji Kompetensi Keahlian Rekayasa Perangkat Lunak Smk Azzainiyyah', 'tahun' => '2026'],
                [
                'nama' => 'CERTIFICATE OF COMPETENCY ASSESSMENT',
                'institusi' => 'PT. SUKA TEKNOLOGI GOBAL',
                'assignment' => 'Junior Web Programmer',
                'level' => 'KOMPETEN',
                'tahun' => '2026'
            ],
                // ['nama' => 'MikroTik MTCNA', 'institusi' => 'MikroTik Academy', 'tahun' => '2022'],
            ],
            'layanan' => [
                [
                    'icon' => '💻',
                    'judul' => 'Service Laptop',
                    'deskripsi' => 'Perbaikan laptop semua merk: ganti LCD, keyboard, baterai, upgrade RAM/SSD, install ulang OS, cleaning, dan perbaikan motherboard.',
                    'harga' => 'Mulai Rp 50.000'
                ],
                [
                    'icon' => '📹',
                    'judul' => 'Instalasi CCTV',
                    'deskripsi' => 'Pemasangan CCTV analog & IP Camera untuk rumah, kantor, toko, dan pabrik. Termasuk konfigurasi remote viewing via smartphone.',
                    'harga' => 'Mulai Rp 1.500.000'
                ],
                [
                    'icon' => '🌐',
                    'judul' => 'Web Development',
                    'deskripsi' => 'Pembuatan website company profile, e-commerce, sistem informasi, landing page, dan aplikasi web custom menggunakan Laravel.',
                    'harga' => 'Tergantung Kebutuhan (bisa di negosiasikan)'
                ],
                [
                    'icon' => '🔧',
                    'judul' => 'Jaringan & Networking',
                    'deskripsi' => 'Instalasi jaringan LAN/WiFi, setting router MikroTik, pemasangan server, dan troubleshooting jaringan.',
                    'harga' => 'Mulai Rp 300.000'
                ],
            ]
        ];

        return view('portofolio.index', compact('data'));
    }
}