<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'nama'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> Hash::make('admin123'),
               'tgl_lahir'=>'2000-01-01',
               'alamat'=>'Jalan Admin',
               'jenis_kelamin'=>'Laki-laki',
               'id_role'=>1,
               'status'=>1
            ],
        ];
  
        foreach ($user as $key => $value) {
            Admin::create($value);
        }
    }
}
