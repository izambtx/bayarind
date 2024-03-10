<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = ['results' => null];

        return view('index', $data);
    }

    public function calculate()
    {
        $totalBelanja = $this->request->getPost('totalBelanja');
        $pecahanUang = [100, 200, 500, 1000, 1500, 2000, 5000, 10000, 20000, 50000, 100000];

        $kemungkinanPembayaran = [];

        // Cek apakah total belanja kurang dari Rp 100.000
        if ($totalBelanja < 100000) {
            foreach ($pecahanUang as $uang) {
                if ($totalBelanja <= $uang) {
                    $kemungkinanPembayaran[] = $uang;
                }
            }
        }


        return view('index', [
            'totalBelanja' => $totalBelanja,
            'kemungkinanPembayaran' => $kemungkinanPembayaran
        ]);
    }

    private function generateCombinations($total, $pecahanUang, $prefix = '')
    {
        $combinations = [];

        foreach ($pecahanUang as $pecahan) {
            $count = floor($total / $pecahan);

            if ($count > 0) {
                for ($i = 1; $i <= $count; $i++) {
                    $newTotal = $total - ($i * $pecahan);

                    if ($newTotal === 0) {
                        $combinations[] = $prefix . "$i x uang " . ($pecahan >= 1000 ? 'kertas' : 'logam') . " " . number_format($pecahan, 0, ',', '.');
                    } else {
                        $combinations = array_merge($combinations, $this->generateCombinations($newTotal, $pecahanUang, $prefix . "$i x uang " . ($pecahan >= 1000 ? 'kertas' : 'logam') . " " . number_format($pecahan, 0, ',', '.') . "\n"));
                    }
                }
            }
        }

        return $combinations;
    }
}
