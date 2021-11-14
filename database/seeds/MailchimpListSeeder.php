<?php

use Illuminate\Database\Seeder;

class MailchimpListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $shops = DB::table('shops')->get();
        if($shops == null)
            return;
        foreach($shops as $shop){
          DB::table('mailchimp_lists')->insert([
                'shop_id' => $shop->id,
                'mailchimp_list_id' => 'undefined', 
                'list_name' => 'subscribers', 
                'created_at' => now(),
                'updated_at' => now()
            ]);            
        }
    }
}
