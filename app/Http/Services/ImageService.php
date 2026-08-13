<?php 

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService {
    
    public function uploadImage(array $data, string $oldImage = null)
    {
        $file = $data['img'];
        $imageName = uniqid() . '.webp'; 
        
        // 1. Definisikan path untuk Gambar Utama dan Thumbnail
        $oripath  = storage_path('app/public/back/');
        $thumPath = storage_path('app/public/back/thumbnail/');

        // 2. Buat folder jika belum ada
        if (!file_exists($oripath)) {
            mkdir($oripath, 0777, true);
        }
        if (!file_exists($thumPath)) {
            mkdir($thumPath, 0777, true);
        }

        $intervention = new ImageManager(new Driver);

        // 3. Simpan Gambar utama (misal: Lebar 900px)
        $intervention->read($file)->scale(width: 900)->toWebp(100)->save($oripath . $imageName);

        // 4. Simpan Thumbnail (misal: Lebar 300px agar lebih ringan)
        $intervention->read($file)->scale(width: 300)->toWebp(50)->save($thumPath . $imageName);

        // 5. Hapus Gambar Lama & Thumbnail Lama (jika ada/update)
        if ($oldImage) {
            Storage::delete([
                'public/back/' . $oldImage, 
                'public/back/thumbnail/' . $oldImage
            ]);
        }

        return $imageName;
    }
}