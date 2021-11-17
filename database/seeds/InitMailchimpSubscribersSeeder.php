<?php

use Illuminate\Database\Seeder;
use DrewM\MailChimp\MailChimp;

class InitMailchimpSubscribersSeeder extends Seeder
{
    public function run()
    {
        //
        $shop = $this->current_shop();
       // $users = DB::table('users')->where('shop_id',$shop->id)->orWhere('shop_id',null)->get();
        $users = DB::table('users')->where('shop_id','5')->get();

        foreach($users as $user){
            Newsletter::subscribe($user->email,['FNAME' => $user->name,'LNAME' => $user->surname]);
            $mailchimpError = Newsletter::getLastError();
            DB::table('mailchimp_subscribers')->insert([
                'shop_id' => $shop->id,
                'user_id' => $user->id,
                'is_active' => ($mailchimpError == false),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    public function current_shop(){
        return (object)['id' => 2];
    }
}
