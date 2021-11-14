<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MailchimpStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mailchimp_statuses')->insert(['status' => 'subscribed', 'created_at' => now(),'updated_at' => now()]);
        DB::table('mailchimp_statuses')->insert(['status' => 'unsubscribed', 'created_at' => now(),'updated_at' => now()]);
        DB::table('mailchimp_statuses')->insert(['status' => 'archived', 'created_at' => now(),'updated_at' => now()]);

    }
}
