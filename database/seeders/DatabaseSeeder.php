<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Schedule;
use App\Models\Gallery;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        AdminUser::create([
            'username' => 'admin',
            'email' => 'admin@srikanditravel.com',
            'password' => Hash::make('admin123'),
            'name' => 'Administrator',
            'role' => 'super_admin',
            'is_active' => true
        ]);

        // Sample Packages Data
        $packages = [
            // Travel Packages - Domestik
            [
                'name' => 'Paket Wisata Bali 3 Hari 2 Malam',
                'destination' => 'Bali',
                'price' => 2500000,
                'duration' => '3 Hari 2 Malam',
                'description' => 'Nikmati keindahan Pulau Dewata dengan paket wisata Bali yang mencakup hotel bintang 3, transportasi, makan, dan tour guide.',
                'image' => 'bali-travel.jpg',
                'mode' => 'travel',
                'category' => 'domestik',
                'is_active' => true
            ],
            [
                'name' => 'Paket Wisata Yogyakarta 2 Hari 1 Malam',
                'destination' => 'Yogyakarta',
                'price' => 1500000,
                'duration' => '2 Hari 1 Malam',
                'description' => 'Jelajahi kota budaya dengan mengunjungi Candi Borobudur, Malioboro, dan Keraton Yogyakarta.',
                'image' => 'yogya-travel.jpg',
                'mode' => 'travel',
                'category' => 'domestik',
                'is_active' => true
            ],
            [
                'name' => 'Paket Wisata Lombok 4 Hari 3 Malam',
                'destination' => 'Lombok',
                'price' => 3200000,
                'duration' => '4 Hari 3 Malam',
                'description' => 'Nikmati keindahan pantai Pink Beach, Gili Trawangan, dan Gunung Rinjani di Lombok.',
                'image' => 'lombok-travel.jpg',
                'mode' => 'travel',
                'category' => 'domestik',
                'is_active' => true
            ],
            // Travel Packages - Internasional
            [
                'name' => 'Paket Wisata Singapura 3 Hari 2 Malam',
                'destination' => 'Singapura',
                'price' => 4500000,
                'duration' => '3 Hari 2 Malam',
                'description' => 'Jelajahi kota modern dengan mengunjungi Universal Studios, Marina Bay Sands, dan Gardens by the Bay.',
                'image' => 'singapore-travel.jpg',
                'mode' => 'travel',
                'category' => 'internasional',
                'is_active' => true
            ],
            [
                'name' => 'Paket Wisata Thailand 4 Hari 3 Malam',
                'destination' => 'Thailand',
                'price' => 3800000,
                'duration' => '4 Hari 3 Malam',
                'description' => 'Nikmati keindahan Bangkok dan Pattaya dengan mengunjungi Grand Palace, Wat Phra Kaew, dan pantai Jomtien.',
                'image' => 'thailand-travel.jpg',
                'mode' => 'travel',
                'category' => 'internasional',
                'is_active' => true
            ],
            [
                'name' => 'Paket Wisata Malaysia 3 Hari 2 Malam',
                'destination' => 'Malaysia',
                'price' => 2800000,
                'duration' => '3 Hari 2 Malam',
                'description' => 'Jelajahi Kuala Lumpur dengan mengunjungi Petronas Towers, Batu Caves, dan Genting Highlands.',
                'image' => 'malaysia-travel.jpg',
                'mode' => 'travel',
                'category' => 'internasional',
                'is_active' => true
            ],
            // Umroh Packages - Domestik
            [
                'name' => 'Paket Umroh Reguler 9 Hari',
                'destination' => 'Makkah & Madinah',
                'price' => 25000000,
                'duration' => '9 Hari',
                'description' => 'Paket umroh reguler dengan akomodasi hotel bintang 3, makan 3x sehari, dan transportasi antar kota.',
                'image' => 'umroh-reguler.jpg',
                'mode' => 'umroh',
                'category' => 'domestik',
                'is_active' => true
            ],
            [
                'name' => 'Paket Umroh Plus Aqso 12 Hari',
                'destination' => 'Makkah, Madinah & Yerusalem',
                'price' => 35000000,
                'duration' => '12 Hari',
                'description' => 'Paket umroh plus ziarah ke Masjid Al-Aqsa dengan akomodasi hotel bintang 4 dan makan halal.',
                'image' => 'umroh-aqso.jpg',
                'mode' => 'umroh',
                'category' => 'domestik',
                'is_active' => true
            ],
            // Umroh Packages - Internasional
            [
                'name' => 'Paket Umroh VIP 9 Hari',
                'destination' => 'Makkah & Madinah',
                'price' => 45000000,
                'duration' => '9 Hari',
                'description' => 'Paket umroh VIP dengan akomodasi hotel bintang 5, makan premium, dan layanan VIP di bandara.',
                'image' => 'umroh-vip.jpg',
                'mode' => 'umroh',
                'category' => 'internasional',
                'is_active' => true
            ],
            [
                'name' => 'Paket Umroh Plus Turki 15 Hari',
                'destination' => 'Makkah, Madinah & Istanbul',
                'price' => 55000000,
                'duration' => '15 Hari',
                'description' => 'Paket umroh plus ziarah ke Istanbul dengan mengunjungi Hagia Sophia, Blue Mosque, dan Topkapi Palace.',
                'image' => 'umroh-turki.jpg',
                'mode' => 'umroh',
                'category' => 'internasional',
                'is_active' => true
            ]
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }

        // Sample Schedules Data
        $schedules = [
            // Travel Schedules
            [
                'date' => '2024-02-15',
                'destination' => 'Bali',
                'mode' => 'travel',
                'description' => 'Keberangkatan ke Bali dengan maskapai Garuda Indonesia',
                'is_active' => true
            ],
            [
                'date' => '2024-02-20',
                'destination' => 'Yogyakarta',
                'mode' => 'travel',
                'description' => 'Keberangkatan ke Yogyakarta dengan kereta api Argo Bromo Anggrek',
                'is_active' => true
            ],
            [
                'date' => '2024-02-25',
                'destination' => 'Singapura',
                'mode' => 'travel',
                'description' => 'Keberangkatan ke Singapura dengan maskapai Singapore Airlines',
                'is_active' => true
            ],
            [
                'date' => '2024-03-01',
                'destination' => 'Thailand',
                'mode' => 'travel',
                'description' => 'Keberangkatan ke Thailand dengan maskapai Thai Airways',
                'is_active' => true
            ],
            // Umroh Schedules
            [
                'date' => '2024-02-10',
                'destination' => 'Makkah & Madinah',
                'mode' => 'umroh',
                'description' => 'Keberangkatan umroh reguler dengan maskapai Saudia Airlines',
                'is_active' => true
            ],
            [
                'date' => '2024-02-15',
                'destination' => 'Makkah, Madinah & Yerusalem',
                'mode' => 'umroh',
                'description' => 'Keberangkatan umroh plus Aqso dengan maskapai Royal Jordanian',
                'is_active' => true
            ],
            [
                'date' => '2024-03-01',
                'destination' => 'Makkah & Madinah',
                'mode' => 'umroh',
                'description' => 'Keberangkatan umroh VIP dengan maskapai Emirates',
                'is_active' => true
            ]
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }

        // Sample Galleries Data
        $galleries = [
            // Travel Galleries
            [
                'image' => 'bali-beach.jpg',
                'caption' => 'Pantai Kuta, Bali',
                'mode' => 'travel',
                'is_active' => true
            ],
            [
                'image' => 'borobudur.jpg',
                'caption' => 'Candi Borobudur, Yogyakarta',
                'mode' => 'travel',
                'is_active' => true
            ],
            [
                'image' => 'singapore-marina.jpg',
                'caption' => 'Marina Bay Sands, Singapura',
                'mode' => 'travel',
                'is_active' => true
            ],
            [
                'image' => 'thailand-temple.jpg',
                'caption' => 'Wat Phra Kaew, Bangkok',
                'mode' => 'travel',
                'is_active' => true
            ],
            // Umroh Galleries
            [
                'image' => 'kaaba.jpg',
                'caption' => 'Ka\'bah, Masjidil Haram',
                'mode' => 'umroh',
                'is_active' => true
            ],
            [
                'image' => 'masjid-nabawi.jpg',
                'caption' => 'Masjid Nabawi, Madinah',
                'mode' => 'umroh',
                'is_active' => true
            ],
            [
                'image' => 'masjid-aqsa.jpg',
                'caption' => 'Masjid Al-Aqsa, Yerusalem',
                'mode' => 'umroh',
                'is_active' => true
            ],
            [
                'image' => 'istanbul-mosque.jpg',
                'caption' => 'Blue Mosque, Istanbul',
                'mode' => 'umroh',
                'is_active' => true
            ]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
