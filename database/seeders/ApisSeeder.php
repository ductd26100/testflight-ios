<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApisSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::table('apis')->delete();

        $apis = [
            ['name' => 'GunDamMe', 'testflight_link' => 'https://testflight.apple.com/join/jx5Tuuj1', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'G6868', 'testflight_link' => 'https://testflight.apple.com/join/A07lLj8E', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'GunVN', 'testflight_link' => 'https://testflight.apple.com/join/Q9FJ2d3o', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'gunplus', 'testflight_link' => 'https://testflight.apple.com/join/LazYtQrL', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'GunChuLoGach', 'testflight_link' => 'https://testflight.apple.com/join/XT9i0YyM', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'Aries', 'testflight_link' => 'https://testflight.apple.com/join/Y1H63Zth', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'Averta', 'testflight_link' => 'https://testflight.apple.com/join/aHpHIXqQ', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'airin', 'testflight_link' => 'https://testflight.apple.com/join/uyqxz9aq', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'Antares', 'testflight_link' => 'https://testflight.apple.com/join/G6a9waWi', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'Gun6X', 'testflight_link' => 'https://testflight.apple.com/join/WRvyjMnS', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'S8899', 'testflight_link' => 'https://testflight.apple.com/join/VGp2rqCg', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30 23:59:59'],
            ['name' => 'SUNS', 'testflight_link' => 'https://testflight.apple.com/join/0qmIQjLb', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'gunbox', 'testflight_link' => 'https://testflight.apple.com/join/SSwuAW6y', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'GUNVL', 'testflight_link' => 'https://testflight.apple.com/join/9c6qFqYv', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'VLG68', 'testflight_link' => 'https://testflight.apple.com/join/N1h8kwZB', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'SunWin', 'testflight_link' => 'https://testflight.apple.com/join/JpH5Gqrf', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'GunSlot', 'testflight_link' => 'https://testflight.apple.com/join/2n4XGUmU', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'Y30', 'testflight_link' => 'https://testflight.apple.com/join/O3OOoKv9', 'start_date' => '2026-01-02', 'expiry_datetime' => '2026-02-01 23:59:59'],
            ['name' => 'P86', 'testflight_link' => 'https://testflight.apple.com/join/wLjJQ8bZ', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03 23:59:59'],
            ['name' => 'GUNZ', 'testflight_link' => 'https://testflight.apple.com/join/qCIWvXjW', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03 23:59:59'],
            ['name' => 'VN88', 'testflight_link' => 'https://testflight.apple.com/join/oPDnR27w', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03 23:59:59'],
            ['name' => 'GunPhat', 'testflight_link' => 'https://testflight.apple.com/join/O8jcSjml', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03 23:59:59'],
            ['name' => 'Bie6', 'testflight_link' => 'https://testflight.apple.com/join/hPJ7WUOj', 'start_date' => '2026-01-06', 'expiry_datetime' => '2026-02-05 23:59:59'],
            ['name' => 'Bie7', 'testflight_link' => 'https://testflight.apple.com/join/oj1oVFm3', 'start_date' => '2026-01-06', 'expiry_datetime' => '2026-02-05 23:59:59'],
            ['name' => 'BieHome', 'testflight_link' => 'https://testflight.apple.com/join/2Sz88K7t', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07 23:59:59'],
            ['name' => 'GUNWINZ', 'testflight_link' => 'https://testflight.apple.com/join/W3vvmjKO', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07 23:59:59'],
            ['name' => 'Gun69', 'testflight_link' => 'https://testflight.apple.com/join/GGLZDyPz', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07 23:59:59'],
            ['name' => 'R3', 'testflight_link' => 'https://testflight.apple.com/join/a5LQ8WCL', 'start_date' => '2026-01-09', 'expiry_datetime' => '2026-02-08 23:59:59'],
            ['name' => 'Gunibet', 'testflight_link' => 'https://testflight.apple.com/join/8qAMhNgz', 'start_date' => '2026-01-09', 'expiry_datetime' => '2026-02-08 23:59:59'],
            ['name' => 'R2', 'testflight_link' => 'https://testflight.apple.com/join/QOA5sR2J', 'start_date' => '2026-01-13', 'expiry_datetime' => '2026-02-12 23:59:59'],
            ['name' => 'WW88', 'testflight_link' => 'https://testflight.apple.com/join/KrAZbnB0', 'start_date' => '2026-01-13', 'expiry_datetime' => '2026-02-12 23:59:59'],
            ['name' => 'BieAZ', 'testflight_link' => 'https://testflight.apple.com/join/P4OFkxrC', 'start_date' => '2026-01-13', 'expiry_datetime' => '2026-02-12 23:59:59'],
            ['name' => 'Mika', 'testflight_link' => 'https://testflight.apple.com/join/kCjTQgFG', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'Gunvuive', 'testflight_link' => 'https://testflight.apple.com/join/o6O6sNYo', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'N88', 'testflight_link' => 'https://testflight.apple.com/join/e7DVu8wC', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'Betni', 'testflight_link' => 'https://testflight.apple.com/join/yiG2fKNM', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'Beting', 'testflight_link' => 'https://testflight.apple.com/join/NjdQ2kNH', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'GunS68', 'testflight_link' => 'https://testflight.apple.com/join/f455XjKg', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'S889', 'testflight_link' => 'https://testflight.apple.com/join/dj1NfH9M', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'GunWevin', 'testflight_link' => 'https://testflight.apple.com/join/0g2qPJY4', 'start_date' => '2026-01-14', 'expiry_datetime' => '2026-02-13 23:59:59'],
            ['name' => 'Sunwin2', 'testflight_link' => 'https://testflight.apple.com/join/tFT91VmY', 'start_date' => '2026-01-15', 'expiry_datetime' => '2026-02-14 23:59:59'],
            ['name' => 'GunS77', 'testflight_link' => 'https://testflight.apple.com/join/uD3HBNMx', 'start_date' => '2026-01-15', 'expiry_datetime' => '2026-02-14 23:59:59'],
            ['name' => 'GunNew3', 'testflight_link' => 'https://testflight.apple.com/join/7dxSXBmO', 'start_date' => '2026-01-15', 'expiry_datetime' => '2026-02-14 23:59:59'],
            ['name' => 'GunThanhKinh', 'testflight_link' => 'https://testflight.apple.com/join/gA0T2OQn', 'start_date' => '2026-01-16', 'expiry_datetime' => '2026-02-15 23:59:59'],
            ['name' => 'TapBien', 'testflight_link' => 'https://testflight.apple.com/join/g3G429pO', 'start_date' => '2026-01-16', 'expiry_datetime' => '2026-02-15 23:59:59'],
            ['name' => 'BieC68', 'testflight_link' => 'https://testflight.apple.com/join/1bfLVIjq', 'start_date' => '2026-01-21', 'expiry_datetime' => '2026-02-20 23:59:59'],
            ['name' => 'BieC77', 'testflight_link' => 'https://testflight.apple.com/join/7b24aXKf', 'start_date' => '2026-01-21', 'expiry_datetime' => '2026-02-20 23:59:59'],
            ['name' => 'Y9', 'testflight_link' => 'https://testflight.apple.com/join/gHJP3bYj', 'start_date' => '2026-01-21', 'expiry_datetime' => '2026-02-20 23:59:59'],
            ['name' => 'Bievua', 'testflight_link' => 'https://testflight.apple.com/join/VtbWINf5', 'start_date' => '2026-01-21', 'expiry_datetime' => '2026-02-20 23:59:59'],
            ['name' => '888B', 'testflight_link' => 'https://testflight.apple.com/join/jDhE68so', 'start_date' => '2026-01-21', 'expiry_datetime' => '2026-02-20 23:59:59'],
            ['name' => 'F99', 'testflight_link' => 'https://testflight.apple.com/join/mFKCfNkS', 'start_date' => '2026-01-23', 'expiry_datetime' => '2026-02-22 23:59:59'],
            ['name' => 'Jun', 'testflight_link' => 'https://testflight.apple.com/join/xV3v9KBn', 'start_date' => '2026-01-23', 'expiry_datetime' => '2026-02-22 23:59:59'],
            ['name' => 'WW99', 'testflight_link' => 'https://testflight.apple.com/join/xIKwQXup', 'start_date' => '2026-01-23', 'expiry_datetime' => '2026-02-22 23:59:59'],
            ['name' => 'Boc99', 'testflight_link' => 'https://testflight.apple.com/join/Uo194i23', 'start_date' => '2026-01-26', 'expiry_datetime' => '2026-02-25 23:59:59'],
            ['name' => 'Fanvip', 'testflight_link' => 'https://testflight.apple.com/join/8tluZgJE', 'start_date' => '2026-01-26', 'expiry_datetime' => '2026-02-25 23:59:59'],
            ['name' => 'E3', 'testflight_link' => 'https://testflight.apple.com/join/dPcMdBjR', 'start_date' => '2026-01-27', 'expiry_datetime' => '2026-02-26 23:59:59'],
            ['name' => 'POKE', 'testflight_link' => 'https://testflight.apple.com/join/GK6NX5G8', 'start_date' => '2026-01-27', 'expiry_datetime' => '2026-02-26 23:59:59'],
            ['name' => 'Go88', 'testflight_link' => 'https://testflight.apple.com/join/VtbWINf5', 'start_date' => '2026-01-27', 'expiry_datetime' => '2026-02-26 23:59:59'],
            ['name' => 'IWIN', 'testflight_link' => 'https://testflight.apple.com/join/gAVqxUc6', 'start_date' => '2026-01-27', 'expiry_datetime' => '2026-02-26 23:59:59'],
            ['name' => 'M99', 'testflight_link' => 'https://testflight.apple.com/join/JZJxJcNP', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27 23:59:59'],
            ['name' => 'W999', 'testflight_link' => 'https://testflight.apple.com/join/YTqQqZ7H', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27 23:59:59'],
            ['name' => 'E168', 'testflight_link' => 'https://testflight.apple.com/join/x0sFpwkT', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27 23:59:59'],
            ['name' => 'GunSodo', 'testflight_link' => 'https://testflight.apple.com/join/LRkMx1vS', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27 23:59:59'],
            ['name' => 'GunFree68', 'testflight_link' => 'https://testflight.apple.com/join/ABU5g8pO', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27 23:59:59'],
        ];

        foreach ($apis as $api) {
            DB::table('apis')->insert([
                'api_id' => strtoupper(Str::random(8)),
                'name' => $api['name'],
                'testflight_link' => $api['testflight_link'],
                'start_date' => $api['start_date'],
                'expiry_datetime' => $api['expiry_datetime'],
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
