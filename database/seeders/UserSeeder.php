<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        $user = new User();
        $user->role_id = 1;
        $user->first_name ='Mr.Super';
        $user->last_name = 'Admin';
        $user->username = 'Super Admin';
        $user->photo = 'image01.jpg';
        $user->phone = '0912345678';
        $user->email = 'superadmin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->slug = 'super_admin';
        $user->created_at= Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->first_name ='Mr.Admin';
        $user->last_name = 'Admin';
        $user->username = 'Admin';
        $user->photo = 'image01.jpg';
        $user->phone = '0912345678';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->slug = 'admin';
        $user->created_at= Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_id = 3;
        $user->first_name ='Mr.Moderatoe';
        $user->last_name = 'Moderator';
        $user->username = 'Moderator';
        $user->photo = 'image01.jpg';
        $user->phone = '0912345678';
        $user->email = 'moderator@gmail.com';
        $user->password = Hash::make('12345678');
        $user->slug = 'moderator';
        $user->created_at= Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_id = 4;
        $user->first_name ='Mr.User';
        $user->last_name = 'User';
        $user->username = 'User';
        $user->photo = 'image01.jpg';
        $user->phone = '0912345678';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('12345678');
        $user->slug = 'user';
        $user->created_at= Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_id = 5;
        $user->first_name ='Mr.Subscriber';
        $user->last_name = 'Subscriber';
        $user->username = 'Subscriber';
        $user->photo = 'image01.jpg';
        $user->phone = '0912345678';
        $user->email = 'subscriber@gmail.com';
        $user->password = Hash::make('12345678');
        $user->slug = 'subscriber';
        $user->created_at= Carbon::now()->toDateTimeString();
        $user->save();
    }
}
