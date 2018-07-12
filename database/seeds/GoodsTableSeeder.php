<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) { 
            # code...
        
            DB::table('goods')->insert([
                'cate_id' => rand(1,20),
                'goods_no'=>str_random(10),
                'goods_name'=> str_random(10),
                'desc'=>'还ok',
                'status'=>1,
                'price'=>8888,
                'thumb'=>'/updata/20180707vGKfulZfS21530945513.jpg',
                'count'=>200,
                'sum'=>0,
                'size'=>'5.0',
                'color'=>'黑色',
                'type'=>'RX8888',
                'memory'=>'4G',
                'content'=>''
            ]);
        }
    }
}
