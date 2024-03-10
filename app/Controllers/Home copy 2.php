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
        $pecahanUang = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500, 200, 100];

        $combinations = $this->generateCombinations($totalBelanja, $pecahanUang);

        foreach ($pecahanUang as $pecahan) {
            if ($totalBelanja < $pecahan) {
                $results[] = $pecahan;
                sort($results);
            }
        }

        return view('index', [
            'totalBelanja' => $totalBelanja,
            'combinations' => $combinations
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
                        $combinations[] = $prefix . "$i x uang " . ($pecahan >= 100 ? 'kertas' : 'logam') . " " . number_format($pecahan, 0, ',', '.');
                    } else {
                        $combinations = array_merge($combinations, $this->generateCombinations($newTotal, $pecahanUang, $prefix . "$i x uang " . ($pecahan >= 1000 ? 'kertas' : 'logam') . " " . number_format($pecahan, 0, ',', '.') . "\n"));
                    }
                }
            }
        }

        return $combinations;
    }
}
