<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->nama = "Fuad P";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('123');
        $user->role = "Admin";
        $user->save();

        $user = new User;
        $user->nama = "Gibran";
        $user->email = "staff@gmail.com";
        $user->password = bcrypt('123');
        $user->role = "Staff";
        $user->save();

        $user = new User;
        $user->nama = "Murad";
        $user->email = "murad@gmail.com";
        $user->password = bcrypt('123');
        $user->role = "Pelanggan";
        $user->save();

        $user = new User;
        $user->nama = "Arthur";
        $user->email = "arthur@gmail.com";
        $user->password = bcrypt('123');
        $user->role = "Pelanggan";
        $user->save();

        $user = new User;
        $user->nama = "Haikal";
        $user->email = "haikal@gmail.com";
        $user->password = bcrypt('123');
        $user->role = "Pelanggan";
        $user->save();

        $user = new User;
        $user->nama = "Ritcher";
        $user->email = "ritcher@gmail.com";
        $user->password = bcrypt('123');
        $user->role = "Pelanggan";
        $user->save();
    }
}
