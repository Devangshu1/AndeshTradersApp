<?php

namespace Database\Seeders;
use App\Models\admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    euser::create([
    //     'username' => 'Hariom Saini',
    //     'phoneno'=>'1234567890',
    //     'address'=>'a-230,gopalpura,jaipur',
    //     'account_detail'=>'1'
    //    ]);
        $json = File::get(path:'database/json/admins.json'); //path: is optional
        $admins = collect(json_decode($json));
        $admins->each(function($admin){
            admin::insert([
                'username' => $admin->username,
                'passward' => Hash::make($admin->passward)
            ]);
        });
    }
}
