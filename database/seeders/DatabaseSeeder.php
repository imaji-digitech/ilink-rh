<?php

namespace Database\Seeders;

use App\Models\InvoiceStatus;
use App\Models\MaterialType;
use App\Models\MutationStatus;
use App\Models\ReceiptType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ReceiptType::create(['title'=>'Kwitansi Keluar']);
        ReceiptType::create(['title'=>'Kwitansi Masuk']);

        MaterialType::create(['title'=>'Shredded Material']);
        MaterialType::create(['title'=>'Balled Material']);
        MaterialType::create(['title'=>'Raw Material']);
        MaterialType::create(['title'=>'Residue Material']);

        InvoiceStatus::create(['title'=>'Tunai']);
        InvoiceStatus::create(['title'=>'Deposit']);
        InvoiceStatus::create(['title'=>'Tempo']);

        MutationStatus::create(['title'=>'Penggunaan produksi']);
        MutationStatus::create(['title'=>'Hasil produksi']);
        MutationStatus::create(['title'=>'Residu produksi']);
        MutationStatus::create(['title'=>'Barang masuk']);
        MutationStatus::create(['title'=>'Barang keluar']);

        User::create([
            'name'=>'asif',
            'email'=>'a@a',
            'password'=>bcrypt('a'),
        ]);
    }
}
