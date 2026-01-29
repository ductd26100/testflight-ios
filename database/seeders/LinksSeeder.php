<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api;

class LinksSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['name' => 'GunFree68', 'testflight_link' => 'https://testflight.apple.com/join/JN8ZXpEC', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30'],
            ['name' => 'GunDamMe', 'testflight_link' => 'https://testflight.apple.com/join/jx5Tuuj1', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30'],
            ['name' => 'gunnoel88', 'testflight_link' => 'https://testflight.apple.com/join/MKE7Pb64', 'start_date' => '2025-12-31', 'expiry_datetime' => '2026-01-30'],
            ['name' => 'GunXaThu', 'testflight_link' => 'https://testflight.apple.com/join/ntJnQbUH', 'start_date' => '2026-01-01', 'expiry_datetime' => '2026-01-30'],
            ['name' => 'G6868', 'testflight_link' => 'https://testflight.apple.com/join/ahrW3WHD', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03'],
            ['name' => 'GunVN', 'testflight_link' => 'https://testflight.apple.com/join/HMUm3euT', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03'],
            ['name' => 'gunplus', 'testflight_link' => 'https://testflight.apple.com/join/4HmnkBnY', 'start_date' => '2026-01-04', 'expiry_datetime' => '2026-02-03'],
            ['name' => 'GunChuLoGach', 'testflight_link' => 'https://testflight.apple.com/join/GsYWUpcU', 'start_date' => '2025-12-05', 'expiry_datetime' => '2026-02-04'],
            ['name' => 'GunXua26', 'testflight_link' => 'https://testflight.apple.com/join/thebq7Xp', 'start_date' => '2026-01-05', 'expiry_datetime' => '2026-02-04'],
            ['name' => 'Ga9X', 'testflight_link' => 'https://testflight.apple.com/join/T394KChy', 'start_date' => '2026-01-06', 'expiry_datetime' => '2026-02-05'],
            ['name' => 'GunXuan', 'testflight_link' => 'https://testflight.apple.com/join/94wsBDDV', 'start_date' => '2026-01-06', 'expiry_datetime' => '2026-02-05'],
            ['name' => 'GBongBi', 'testflight_link' => 'https://testflight.apple.com/join/rVDMgSX9', 'start_date' => '2026-01-06', 'expiry_datetime' => '2026-02-06'],
            ['name' => 'Gunnyzingme', 'testflight_link' => 'https://testflight.apple.com/join/Jkk6D1B9', 'start_date' => '2026-01-07', 'expiry_datetime' => '2026-02-06'],
            ['name' => 'GunnyBH', 'testflight_link' => 'https://testflight.apple.com/join/aUjaxHQk', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07'],
            ['name' => 'AdLikeGun', 'testflight_link' => 'https://testflight.apple.com/join/RH5J4fGV', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07'],
            ['name' => 'Gunny79', 'testflight_link' => 'https://testflight.apple.com/join/3KWFfmYg', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07'],
            ['name' => 'G369', 'testflight_link' => 'https://testflight.apple.com/join/7hQX64EY', 'start_date' => '2026-01-08', 'expiry_datetime' => '2026-02-07'],
            ['name' => 'GunFam', 'testflight_link' => 'https://testflight.apple.com/join/whJtWmsy', 'start_date' => '2026-01-09', 'expiry_datetime' => '2026-02-08'],
            ['name' => 'vgun', 'testflight_link' => 'https://testflight.apple.com/join/3Ccxb4K7', 'start_date' => '2026-01-11', 'expiry_datetime' => '2026-02-10'],
            ['name' => 'Gunny07MB', 'testflight_link' => 'https://testflight.apple.com/join/NvAvbqU1', 'start_date' => '2026-01-11', 'expiry_datetime' => '2026-02-10'],
            ['name' => 'Gun1789', 'testflight_link' => 'https://testflight.apple.com/join/5wUPcg4z', 'start_date' => '2026-01-09', 'expiry_datetime' => '2026-02-08'],
            ['name' => 'Gun4Mua', 'testflight_link' => 'https://testflight.apple.com/join/bY6tXTKx', 'start_date' => '2026-01-11', 'expiry_datetime' => '2026-02-10'],
            ['name' => 'LoveGunny', 'testflight_link' => 'https://testflight.apple.com/join/GPnMWkZr', 'start_date' => '2025-12-17', 'expiry_datetime' => '2026-02-15'],
            ['name' => 'GunBaoThu', 'testflight_link' => 'https://testflight.apple.com/join/JNfKEeUH', 'start_date' => '2026-01-13', 'expiry_datetime' => '2026-02-12'],
            ['name' => 'GunKyNiem', 'testflight_link' => 'https://testflight.apple.com/join/GgDmXX8n', 'start_date' => '2026-01-12', 'expiry_datetime' => '2026-02-11'],
            ['name' => 'DDTHaven', 'testflight_link' => 'https://testflight.apple.com/join/CHTaDbH8', 'start_date' => '2026-01-13', 'expiry_datetime' => '2026-02-12'],
            ['name' => 'Gun2026 - ADMIN2', 'testflight_link' => 'https://testflight.apple.com/join/8kdxuSWE', 'start_date' => '2026-01-13', 'expiry_datetime' => '2026-02-12'],
            ['name' => 'PCGUN', 'testflight_link' => 'https://testflight.apple.com/join/ZBsUeGZu', 'start_date' => '2026-01-15', 'expiry_datetime' => '2026-02-14'],
            ['name' => 'Gunny1', 'testflight_link' => 'https://testflight.apple.com/join/7upsGMCY', 'start_date' => '2026-01-16', 'expiry_datetime' => '2026-02-15'],
            ['name' => 'GunTet2026', 'testflight_link' => 'https://testflight.apple.com/join/2cDkA33t', 'start_date' => '2026-01-16', 'expiry_datetime' => '2026-02-15'],
            ['name' => 'Webgun247', 'testflight_link' => 'https://testflight.apple.com/join/uJXpVU15', 'start_date' => '2026-01-18', 'expiry_datetime' => '2026-02-17'],
            ['name' => 'G999', 'testflight_link' => 'https://testflight.apple.com/join/XXh9PUe5', 'start_date' => '2026-01-18', 'expiry_datetime' => '2026-02-17'],
            ['name' => 'gunny8x', 'testflight_link' => 'https://testflight.apple.com/join/v1uC3CPf', 'start_date' => '2026-01-18', 'expiry_datetime' => '2026-02-17'],
            ['name' => 'CuongHoa23', 'testflight_link' => 'https://testflight.apple.com/join/BM6gH2Ju', 'start_date' => '2026-01-18', 'expiry_datetime' => '2026-02-24'],
            ['name' => 'GaPhatTai', 'testflight_link' => 'https://testflight.apple.com/join/dnVHZx9D', 'start_date' => '2026-01-19', 'expiry_datetime' => '2026-02-18'],
            ['name' => 'RosaGun', 'testflight_link' => 'https://testflight.apple.com/join/wFCWDJ3u', 'start_date' => '2026-01-19', 'expiry_datetime' => '2026-02-18'],
            ['name' => 'Happygun', 'testflight_link' => 'https://testflight.apple.com/join/UcBkR68x', 'start_date' => '2026-01-20', 'expiry_datetime' => '2026-02-19'],
            ['name' => 'GGiaiPhong', 'testflight_link' => 'https://testflight.apple.com/join/jxThzDqW', 'start_date' => '2026-01-20', 'expiry_datetime' => '2026-02-19'],
            ['name' => 'GHoiUc', 'testflight_link' => 'https://testflight.apple.com/join/G9tkdry1', 'start_date' => '2026-01-20', 'expiry_datetime' => '2026-02-19'],
            ['name' => 'GunPro', 'testflight_link' => 'https://testflight.apple.com/join/ZD8kgVcf', 'start_date' => '2026-01-22', 'expiry_datetime' => '2026-02-21'],
            ['name' => 'GAnhHung', 'testflight_link' => 'https://testflight.apple.com/join/PkZ64rrB', 'start_date' => '2026-01-22', 'expiry_datetime' => '2026-02-21'],
            ['name' => 'GunHN', 'testflight_link' => 'https://testflight.apple.com/join/tgXr5aMB', 'start_date' => '2026-01-26', 'expiry_datetime' => '2026-02-25'],
            ['name' => 'CaptainGun', 'testflight_link' => 'https://testflight.apple.com/join/5fxqmTkg', 'start_date' => '2026-01-22', 'expiry_datetime' => '2026-02-21'],
            ['name' => 'BoxGunny', 'testflight_link' => 'https://testflight.apple.com/join/CtVrnvUp', 'start_date' => '2026-01-22', 'expiry_datetime' => '2026-02-21'],
            ['name' => 'GunKhaiXuan', 'testflight_link' => 'https://testflight.apple.com/join/XNP92bmf', 'start_date' => '2026-01-22', 'expiry_datetime' => '2026-02-21'],
            ['name' => 'GunGo', 'testflight_link' => 'https://testflight.apple.com/join/T6bw34RN', 'start_date' => '2026-01-23', 'expiry_datetime' => '2026-02-22'],
            ['name' => 'GMongMo', 'testflight_link' => 'https://testflight.apple.com/join/2Fnpe6AA', 'start_date' => '2026-01-24', 'expiry_datetime' => '2026-02-23'],
            ['name' => 'Gun2026', 'testflight_link' => 'https://testflight.apple.com/join/34reMCRu', 'start_date' => '2026-01-23', 'expiry_datetime' => '2026-02-22'],
            ['name' => 'Gunnyzing', 'testflight_link' => 'https://testflight.apple.com/join/dPTqwAPe', 'start_date' => '2026-01-23', 'expiry_datetime' => '2026-02-22'],
            ['name' => 'GaVang23', 'testflight_link' => 'https://testflight.apple.com/join/Ump4vqAE', 'start_date' => '2026-01-24', 'expiry_datetime' => '2026-02-23'],
            ['name' => 'Gun2008', 'testflight_link' => 'https://testflight.apple.com/join/FkVVyBU3', 'start_date' => '2026-01-25', 'expiry_datetime' => '2026-02-24'],
            ['name' => 'Gatatnien', 'testflight_link' => 'https://testflight.apple.com/join/VrQzkn1f', 'start_date' => '2026-01-24', 'expiry_datetime' => '2026-02-23'],
            ['name' => 'GHoiUc2', 'testflight_link' => 'https://testflight.apple.com/join/vuqXBMsZ', 'start_date' => '2026-01-25', 'expiry_datetime' => '2026-02-24'],
            ['name' => 'GunPow123', 'testflight_link' => 'https://testflight.apple.com/join/cXKf31aZ', 'start_date' => '2026-01-25', 'expiry_datetime' => '2026-02-24'],
            ['name' => 'BoLacGa', 'testflight_link' => 'https://testflight.apple.com/join/5ZbvJdqd', 'start_date' => '2026-01-26', 'expiry_datetime' => '2026-02-25'],
            ['name' => 'GunnyPro', 'testflight_link' => 'https://testflight.apple.com/join/JmTe4WDw', 'start_date' => '2026-01-26', 'expiry_datetime' => '2026-02-25'],
            ['name' => 'GunThoiGian', 'testflight_link' => 'https://testflight.apple.com/join/T6d5rGqs', 'start_date' => '2026-01-26', 'expiry_datetime' => '2026-02-25'],
            ['name' => 'GunnyOnline', 'testflight_link' => 'https://testflight.apple.com/join/WR8C1XpY', 'start_date' => '2026-01-27', 'expiry_datetime' => '2026-02-26'],
            ['name' => 'GunZing', 'testflight_link' => 'https://testflight.apple.com/join/bXFY3Ewd', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27'],
            ['name' => 'gatailoc', 'testflight_link' => 'https://testflight.apple.com/join/66WEuAWx', 'start_date' => '2026-01-29', 'expiry_datetime' => '2026-02-28'],
            ['name' => 'GaHoaiBao', 'testflight_link' => 'https://testflight.apple.com/join/wKRj3VRs', 'start_date' => '2026-01-28', 'expiry_datetime' => '2026-02-27'],
            ['name' => 'EasyGame', 'testflight_link' => 'https://testflight.apple.com/join/BuYfJXXF', 'start_date' => '2026-01-30', 'expiry_datetime' => '2026-03-01'],
        ];

        foreach ($links as $link) {
            Api::create([
                'name' => $link['name'],
                'testflight_link' => $link['testflight_link'],
                'start_date' => $link['start_date'],
                'expiry_datetime' => $link['expiry_datetime'],
                'status' => 'open',
            ]);
        }
    }
}
