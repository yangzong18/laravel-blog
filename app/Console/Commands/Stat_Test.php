<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Stat_Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stat:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
		$this->addData();
    }
    public function addData(){
		$id = DB::table('data_test')->insertGetId(['text' => '这是一个测试'.date('Y-h-d H:i:s'),'add_time'=>date('Y-h-d H:i:s')]);
		if ($id) {
			\Log::info('定时/数据插入成功', ['id'=>$id,'number'=>$rand]);
		} else {
			\Log::error('定时/数据插入失败', ['id'=>$id,'number'=>$rand]);
		}
	}
}
