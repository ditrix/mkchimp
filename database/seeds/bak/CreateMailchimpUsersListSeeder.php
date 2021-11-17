<?php

use Illuminate\Database\Seeder;

class CreateMailchimpUsersListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = DB::table('users')->get();
        foreach($users as $user){
            $list_id = $this->getListId($user->shop_id);
            DB::table('mailchimp_users_list')->insert([
                'user_id' => $user->id,
                'list_id' => getListId($user->shop_id),

        // $table->string('tag');
        //     $table->integer('status_id')->nullable();
        //     $table->bigInteger('user_id')->unsigned();
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->integer('list_id')->unsigned();
        //     $table->foreign('list_id')->references('id')->on('mailchimp_lists');            
        //     $table->timestamps();



            ]);
        }
    }
    function getListId($shop_id, $default_shop_id = '2'){
        $shop_id =  $shop_id??$default_shop_id;

        $mailchimp_list = DB::table('mailchimp_lists')->where('shop_id')->first();
        dd($mailchimp_list);
    }
}
