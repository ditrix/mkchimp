<?php

use Illuminate\Database\Seeder;

class SetShopOptionsMailchimTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	$shops = DB::table('shops')->get();
        if($shops == null)
            return;
        foreach($shops as $shop){
          DB::table('shop_settings')->insert([
            'shop_id' => $shop->id,
            'key' => 'mailchimp_shop_tag',
            'value' =>  '{"default":"'. $shop->prefix.'_DEFAULT'.'"}',
            'created_at' => now(),
            'updated_at' => now()
        	]);
	}              
    }
}
