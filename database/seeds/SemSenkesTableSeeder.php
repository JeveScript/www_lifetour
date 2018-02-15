<?php

use Illuminate\Database\Seeder;
use App\Models\SemSenke;
use App\Models\SemJidian;
use Carbon\Carbon;

class SemSenkesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDateTimeString();
        $sem_array = [
            'name' => 'test',
            'wechat_num' => 'testwechat123',
            'phone' => '13511111111',
            'hmsr' => 'baidu_sem_23423',
            'date' => '2017-02-14',
            'time' => '13:53',
            'ip' => '127.0.0.1',
            'type' => 'M-1',
            'position' => '1',
            'refferrer' => 'http://www.baidu.com',
            'location' => 'http://www.baidu.com',
            'content' => json_encode(['test'=>'abc']),
            'created_at' => $now,
            'updated_at' => $now
        ];

        SemSenke::insert($sem_array);
        SemSenke::insert($sem_array);
        SemJidian::insert($sem_array);
        SemJidian::insert($sem_array);
    }
}
