<?php
class Helper {
    private $satuan = [
        0 => 'Nol',
        1 => 'Satu',
        2 => 'Dua',
        3 => 'Tiga',
        4 => 'Empat',
        5 => 'Lima',
        6 => 'Enam',
        7 => 'Tujuh',
        8 => 'Delapan',
        9 => 'Sembilan',
        10 => 'Sepuluh',
        11 => 'Sebelas',
        12 => 'Dua Belas',
        13 => 'Tiga Belas',
        14 => 'Empat Belas',
        15 => 'Lima Belas',
        16 => 'Enam Belas',
        17 => 'Tujuh Belas',
        18 => 'Delapan Belas',
        19 => 'Sembilan Belas'
    ];

    private $puluhan = [
        20 => 'Dua Puluh',
        30 => 'Tiga Puluh',
        40 => 'Empat Puluh',
        50 => 'Lima Puluh',
        60 => 'Enam Puluh',
        70 => 'Tujuh Puluh',
        80 => 'Delapan Puluh',
        90 => 'Sembilan Puluh'
    ];

    private $ribuan = 'Ribu';
    private $jutaan = 'Juta';
    public function formatDate($date) {
        $month = array (
            1 =>   'Januari',
            2 =>   'Februari',
            3 =>   'Maret',
            4 =>   'April',
            5 =>   'Mei',
            6 =>   'Juni',
            7 =>   'Juli',
            8 =>   'Agustus',
            9 =>   'September',
            10 =>   'Oktober',
            11 =>   'November',
            12 =>   'Desember'
        );
        $break = explode('-', $date);
     
        return $break[2] . ' ' . $month[ (int)$break[1] ] . ' ' . $break[0];
    }

    public function konversi($angka) {
        if ($angka < 20) {
            return $this->satuan[$angka];
        } elseif ($angka < 100) {
            $puluhan = floor($angka / 10) * 10;
            $sisa = $angka % 10;
            $teks = $this->puluhan[$puluhan];
            if ($sisa > 0) {
                $teks .= ' ' . $this->satuan[$sisa];
            }
            return $teks;
        } elseif ($angka < 1000) {
            $ratusan = floor($angka / 100);
            $sisa = $angka % 100;
            $teks = $this->satuan[$ratusan] . ' Ratus';
            if ($sisa > 0) {
                $teks .= ' ' . $this->konversi($sisa);
            }
            return $teks;
        } elseif ($angka < 1000000) {
            $ribuan = floor($angka / 1000);
            $sisa = $angka % 1000;
            $teks = $this->konversi($ribuan) . ' ' . $this->ribuan;
            if ($sisa > 0) {
                $teks .= ' ' . $this->konversi($sisa);
            }
            return $teks;
        } elseif ($angka < 1000000000) {
            $jutaan = floor($angka / 1000000);
            $sisa = $angka % 1000000;
            $teks = $this->konversi($jutaan) . ' ' . $this->jutaan;
            if ($sisa > 0) {
                $teks .= ' ' . $this->konversi($sisa);
            }
            return $teks;
        } else {
            return 'Angka diluar rentang konversi.';
        }
    }

}
