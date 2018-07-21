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
        //
        
        for ($i=0; $i < 15; $i++) { 
            # code...
        
            DB::table('goods')->insert([
                'cate_id' => 1,
                'goods_no'=>str_random(10),
                'goods_name'=> str_random(10),
                'desc'=>'还ok',
                'status'=>1,
                'price'=>1999,
                'thumb'=>'/updata/2018072189h0c0M03k1532154956.jpg',
                'count'=>200,
                'sum'=>0,
                'size'=>'5.0,5.5',
                'color'=>'黑色,白色',
                'type'=>'RX8888',
                'memory'=>'32G,64G',
                'content'=>''
            ]);
        }
    }
}
