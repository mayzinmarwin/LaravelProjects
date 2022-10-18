<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\UserRole;
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserRole::truncate();
        $user_role = new UserRole();
        $user_role->name = "Super Admin";
        $user_role->serial ='1';
        $user_role->slug = 'super_admin';
        $user_role->created_at= Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->name = "Admin";
        $user_role->serial ='2';
        $user_role->slug = 'admin';
        $user_role->created_at= Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->name = "Moderator";
        $user_role->serial ='3';
        $user_role->slug = 'moderator';
        $user_role->created_at= Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->name = "User";
        $user_role->serial ='4';
        $user_role->slug = 'user';
        $user_role->created_at= Carbon::now()->toDateTimeString();
        $user_role->save();

        $user_role = new UserRole();
        $user_role->name = "Subscriber";
        $user_role->serial ='5';
        $user_role->slug = 'Subscriber';
        $user_role->created_at= Carbon::now()->toDateTimeString();
        $user_role->save();
    }
}
