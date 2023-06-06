<?php

namespace App\Http\Livewire;

use App\Models\MaterialMutation;
use Illuminate\Support\Str;
use Livewire\Component;

class MakeReportMaterialMutation extends Component
{
    public $dateStart;
    public $dateEnd;
    public $errorMessage;

    public function mount() {}

    public function download()
    {

        if ($this->dateStart == null or $this->dateEnd == null) {
$this->errorMessage="Tanggal mulai dan akhir silahkan di isi";
        } else {
            $materialMutation = MaterialMutation::whereBetween('created_at',
                [$this->dateStart, $this->dateEnd])->orderBy('created_at')
                                                ->get();
            $fileName
                = Str::slug("Rekap Mutasi $this->dateStart - $this->dateEnd")
                .".csv";
            $headers = [
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0",
            ];
            $callback = function () use ($materialMutation) {
                $delimiter = ';';
                $file = fopen('php://output', 'w');
                fputcsv($file, [''], $delimiter);
                fputcsv($file, [
                    'Tanggal', 'Tipe','Material', 'Status Proses', 'Jumlah',
                ], $delimiter);
                foreach ($materialMutation as $mm) {
                    fputcsv($file, [
                        $mm->created_at->format('d/M/Y'),
                        $mm->material->type,
                        $mm->material->name,
                        $mm->mutationStatus->title,
                        thousand_format($mm->amount),
                    ], $delimiter);
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        }
    }

    public function exportCSV($umkm, $id)
    {


        $callback = function () use ($c, $c1, $cashBooks, $umkm) {
            $delimiter = ';';
            $file = fopen('php://output', 'w');
            fputcsv($file, [''], $delimiter);

            $co = [];
            $ct = 0;
            foreach (CodeCashBook::get() as $pt) {
                if ($cashBooks->where('code_cash_book_id', $pt->id)
                              ->count() == 0 or $pt->id == 999 or $pt->id
                    == 1
                ) {
                    continue;
                }
                fputcsv($file,
                    ['Tanggal', 'Kode', 'Keterangan', 'Masuk', 'Keluar'],
                    $delimiter);
                $count = 0;
                foreach (
                    $cashBooks->where('code_cash_book_id', $pt->id) as
                    $cashBook
                ) {
                    fputcsv($file, [
                        $cashBook->created_at->format('d/M/Y'),
                        "'".str_pad($cashBook->code_cash_book_id, 3,
                            '0', STR_PAD_LEFT),
                        $cashBook->note,
                        $cashBook->income,
                        $cashBook->outcome,
                    ], $delimiter);
                    $count = $count + $cashBook->income
                        - $cashBook->outcome;
                }
                $co[$pt->id] = $count;
                $ct += $count;
                fputcsv($file, [''], $delimiter);
            }
            fputcsv($file, [''], $delimiter);
            fputcsv($file, ['Laporan Laba Rugi'], $delimiter);
            fputcsv($file, [
                'Periode '.$c->created_at->format('d/M/Y').' - '
                .$c1->created_at->format('d/M/Y'),
            ], $delimiter);
            foreach (CodeCashBook::get() as $pt) {
                if ($cashBooks->where('code_cash_book_id', $pt->id)
                              ->count() == 0 or $pt->id == 999 or $pt->id
                    == 1
                ) {
                    continue;
                }
                if (isset($co[$pt->id])) {
                    fputcsv($file, [
                        "'".str_pad($pt->id, 3, '0', STR_PAD_LEFT),
                        $pt->title,
                        $co[$pt->id],
                    ], $delimiter);
                }
            }
            fputcsv($file, ['', 'TOTAL', $ct], $delimiter);

            fputcsv($file, [''], $delimiter);
            fputcsv($file, ['NB', 'Stock Optane'], $delimiter);
            fputcsv($file, ['Nama Produk', 'Stock', 'Total'], $delimiter);
            $total = 0;
            foreach ($c1->productHistories as $p) {
                fputcsv($file,
                    [$p->product->title, $p->stock, $p->stock * $p->price],
                    $delimiter);
                $total += $p->stock * $p->price;
            }
            fputcsv($file, ['Total', '', $total], $delimiter);

            fputcsv($file, [''], $delimiter);
            fputcsv($file, ['NB', 'Profit'], $delimiter);
            fputcsv($file, [
                'Nama Produk', 'Total', 'Nomina HPP', 'Profit 30%',
                '50%(Imaji)', '25%(Kelompok usaha)', '15%(Pengembangan)',
                '10%(Dana sosial)',
            ], $delimiter);

            foreach ($c1->productSaleHistories as $p) {
                fputcsv($file, [
                    $p->product->title,
                    $p->stock,
                    $p->stock * $p->price,
                    $p->stock * $p->price * 0.3,
                    $p->stock * $p->price * 0.3 * 0.5,
                    $p->stock * $p->price * 0.3 * 0.25,
                    $p->stock * $p->price * 0.3 * 0.15,
                    $p->stock * $p->price * 0.3 * 0.10,
                ], $delimiter);
            }
            fputcsv($file, [''], $delimiter);
            fputcsv($file, ['Dicetak pada '.date('Y-m-d')], $delimiter);
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function render()
    {
        return view('livewire.make-report-material-mutation');
    }
}
