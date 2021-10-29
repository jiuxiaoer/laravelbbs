<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 生成数据集合
        User::factory()->count(10)->create();

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'JiuXiao';
        $user->email = 'yinshen@79xj.cn';
        $user->avatar = '/uploads/images/202110/29/2_1635496220_DFLMntqkxp.jpg';
        $user->save();
    }
}
