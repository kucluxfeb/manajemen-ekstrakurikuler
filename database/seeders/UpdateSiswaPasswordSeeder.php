<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateSiswaPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswas = DB::table('siswa')->get();

        foreach ($siswas as $siswa) {
            if (!password_get_info($siswa->password)['algo']) {
                DB::table('siswa')->where('id', $siswa->id)->update(['password' => Hash::make($siswa->password)]);
            }
        }
    }
}
