<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		Users::truncate();  // 先清理表数据
		factory(Users::class, 1)->create();  // 一次填充20篇文章
    }
}
