<?php

namespace App\Controllers;

use App\Models\PhotoModel;
use App\Models\WishModel;

class Anniversary extends BaseController
{
    // Halaman 1: Home / Dashboard
    public function index()
    {
        return view('pages/home');
    }

    // Halaman 2: Memory Timeline
    public function timeline()
    {
        $data['memories'] = [
            ['date' => '17 Agustus 2025', 'story' => "Pemilihan komting GRASITION'25 dan Er jadi komting. Er mulai caper ke Dinda xixi 👑✨", 'image' => '1.jpg'],
            ['date' => '9 September 2025', 'story' => 'Foto bareng Er & Nda untuk tugas PROKSI 📸', 'image' => '2.jpg'],
            ['date' => '26 September 2025', 'story' => 'Er modus ajak laminating ID card sampai ke Sedati wkwkwk 💳🛵', 'image' => '3.jpg'],
            ['date' => '1 Oktober 2025', 'story' => 'Er nemenin Dinda beli cas baru, first time PAP ke mama dengan wajah full face, first time nge-date ke Sidoarjo, dan first time pulang hampir tengah malam AHAHAHAH 🌙', 'image' => '4.jpg'],
            ['date' => '2 Oktober 2025', 'story' => 'Mam malam nasgor Ortega after rapat angkatan 🍛', 'image' => '5.jpg'],
            ['date' => '5 Oktober 2025', 'story' => 'Er ajak Dinda nge-date ke museum dan di kedai Er nembak Dinda, tapi ditolak Dinda huhuhu Er sad 💔🥲', 'image' => '6.jpg'],
            ['date' => '7 Oktober 2025', 'story' => 'Er dan Dinda ke kedai atas atap sampai ke UINSA 1 hahahayy ☕', 'image' => '7.jpg'],
            ['date' => '10 Oktober 2025', 'story' => 'RESMI PACARAANN YEYEYEYYY!!! 💖🎉', 'image' => '8.jpg'],
            ['date' => '11 Oktober 2025', 'story' => 'Makan mie ayam after last day PROKSI 🍜', 'image' => '9.jpg'],
            ['date' => '26 Oktober 2025', 'story' => 'Er dan Dinda kembali lagi ke Kedai Harapan Djaja untuk buat case stiker couple 📱✨', 'image' => '10.jpg'],
            ['date' => '6 November 2025', 'story' => 'After Kopken kita mam bakso dan kehabisan bensin wkwk jadi kita ndorooonggg ⛽🛵', 'image' => '11.jpg'],
            ['date' => '26 November 2025', 'story' => 'Mam seafood BM-nya Dinda after gak kebagian yeyeyeyey 🦀', 'image' => '12.jpg'],
            ['date' => '30 November 2025', 'story' => 'Kita mam bakso dan angkringan di Pacet, seruu dingiiinn 🏔️', 'image' => '13.jpg'],
            ['date' => '15 Desember 2025', 'story' => "Kita berangkat villa bareng GRASITION'25 🏡", 'image' => '14.jpg'],
            ['date' => '16 Desember 2025', 'story' => 'Er dan Dinda GOES TO MALAAANGG LESSGOO! 🚗💨', 'image' => '15.jpg'],
            ['date' => '24 Desember 2025', 'story' => 'Nonton Janur Ireng 🎬', 'image' => '16.jpg'],
            ['date' => '9 Februari 2026', 'story' => 'Mam es krim Momoyo voucher TikTok 🍦', 'image' => '17.jpg'],
            ['date' => '19 Maret 2026', 'story' => 'Er join tongkrongan Dinda di Krian ☕', 'image' => '18.jpg'],
            ['date' => '27 Maret 2026', 'story' => 'Kita ke Belia Sidoarjo lanjut ngopi dan mam Mak Tuk ☕🍛', 'image' => '19.jpg'],
            ['date' => '4 April 2026', 'story' => 'Kita mam sushi (Er first timeee) lalu kita photobooth 🍣📸', 'image' => '20.jpg'],
            ['date' => '5 April 2026', 'story' => 'Mam bakso Cak Mad juooosss 🥣', 'image' => '21.jpg'],
            ['date' => '10 April 2026', 'story' => 'Mam Gacoan after UTS terakhir 🍝', 'image' => '22.jpg'],
            ['date' => '19 April 2026', 'story' => 'ULTAH ER! Dan kita goes to KBS YEY!!! 🎂🦁', 'image' => '23.jpg'],
            ['date' => '25 April 2026', 'story' => 'Er & Dinda double date sama Adis & Jona 👫👫', 'image' => '24.jpg'],
            ['date' => '8 Juni 2026', 'story' => 'TAMAN HARMONIIIII 🌸', 'image' => '25.jpg'],
            ['date' => '11 Juni 2026', 'story' => 'Nyoree di Lagoon 🌅', 'image' => '26.jpg'],
            ['date' => '18 Juni 2026', 'story' => 'FAMGATH WARGA SISTEM INFORMASIIII 🎓🎉', 'image' => '27.jpg'],
            ['date' => '19 Juni 2026', 'story' => 'GARTENHUTTE! 🌿', 'image' => '28.jpg'],
            ['date' => '23 Juni 2026', 'story' => 'Nonton di bioskop baru Sidoarjo 🍿', 'image' => '29.jpg'],
            ['date' => '5 Juli 2026', 'story' => 'CFD SIDOARJOOOOO!!!! 🏃‍♀️🏃‍♂️', 'image' => '30.jpg'],
            ['date' => '18 Juli 2026', 'story' => 'Ngopi Sidoarjo ☕', 'image' => '31.jpg'],
            ['date' => '1 Agustus 2026', 'story' => 'Kita piknik date ke Ranu Mandurooo 🍃', 'image' => '32.jpg'],
            ['date' => '21 Agustus 2026', 'story' => 'Date Kota Lama dan Dinda dapat first flower yeyyy 💐✨', 'image' => '33.jpg'],
        ];

        return view('pages/timeline', $data);
    }

    // Halaman 3: Virtual Photobooth Studio
    public function photobooth()
    {
        $photoModel = new PhotoModel();
        $data['photos'] = $photoModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/photobooth', $data);
    }

    // Halaman 4: Wall of Wishes
    public function wishes()
    {
        $wishModel = new WishModel();
        $data['wishes'] = $wishModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/wishes', $data);
    }

    // API Endpoint: Simpan Photo Strip Base64
    public function savePhoto()
    {
        $json = $this->request->getJSON();
        if (!$json || !isset($json->image) || !is_string($json->image)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Foto tidak valid'])->setStatusCode(400);
        }

        $base64Image = $json->image;
        if (!preg_match('/^data:image\/(png|jpeg|webp);base64,/', $base64Image, $type)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Format Base64 salah'])->setStatusCode(400);
        }

        $data = base64_decode(substr($base64Image, strpos($base64Image, ',') + 1), true);
        $imageInfo = $data === false ? false : getimagesizefromstring($data);
        $expectedMime = 'image/' . $type[1];
        if ($data === false || $imageInfo === false || $imageInfo['mime'] !== $expectedMime) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data foto tidak valid'])->setStatusCode(400);
        }

        $ext = $type[1] === 'jpeg' ? 'jpg' : $type[1];
        $fileName  = 'photostrip_' . time() . '_' . uniqid() . '.' . $ext;
        $uploadDir = FCPATH . 'uploads/photobooth/';

        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true) && !is_dir($uploadDir)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Folder penyimpanan foto tidak dapat dibuat'])->setStatusCode(500);
        }

        if (file_put_contents($uploadDir . $fileName, $data) === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Foto tidak dapat ditulis ke penyimpanan'])->setStatusCode(500);
        }

        $photoModel = new PhotoModel();
        if ($photoModel->insert([
            'image_path' => 'uploads/photobooth/' . $fileName,
            'created_at' => date('Y-m-d H:i:s')
        ]) === false) {
            unlink($uploadDir . $fileName);
            return $this->response->setJSON(['status' => 'error', 'message' => 'Foto tersimpan tetapi gagal ditambahkan ke galeri'])->setStatusCode(500);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Foto berhasil disimpan ke galeri server!']);
    }

    // API Endpoint: Simpan Wish
    public function saveWish()
    {
        $json = $this->request->getJSON();
        if (!$json || !isset($json->name, $json->message) || !is_string($json->name) || !is_string($json->message)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Lengkapi form!'])->setStatusCode(400);
        }
        $name = trim($json->name);
        $message = trim($json->message);
        if ($name === '' || $message === '') {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Lengkapi form!'])->setStatusCode(400);
        }

        $wishModel = new WishModel();
        if ($wishModel->insert([
            'name'       => $name,
            'message'    => $message,
            'created_at' => date('Y-m-d H:i:s')
        ]) === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Pesan tidak dapat disimpan. Silakan coba lagi.'])->setStatusCode(500);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Pesan manis tersimpan!']);
    }
    // Tambahkan fungsi cinema di Anniversary.php
    public function cinema()
    {
        return view('pages/cinema');
    }
}