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
        $totalBelanja = $this->request->getVar('totalBelanja');
        $pecahanUang = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500, 200, 100];

        $combinations = $this->findMinimalCombinations($totalBelanja, $pecahanUang);

        return view('index', ['combinations' => $combinations, 'totalBelanja' => $totalBelanja]);
    }

    private function findMinimalCombinations($totalBelanja, $pecahanUang)
    {
        $combinations = [];
        $remaining = $totalBelanja;

        rsort($pecahanUang); // Pastikan mulai dari pecahan terbesar

        foreach ($pecahanUang as $pecahan) {
            $count = floor($remaining / $pecahan);
            if ($count > 0) {
                $combinations[$pecahan] = $count;
                $remaining -= $pecahan * $count;
            }
            if ($remaining <= 0) break;
        }

        return $combinations;
    }
}
