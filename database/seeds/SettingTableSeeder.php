<?php

use Illuminate\Database\Seeder;
use App\SiteSetting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new SiteSetting();

        /**
         * 0 => text
         * 1 => url
         * 2 => file
         * 3 => textarea
         * 4 => phone
         */


        $setting1 = [
            'name' => 'fb' ,
            'en_content' => 'https://facebook.com',
            'ar_content' => '' ,
            'type' => 'url' ,
            'slug' => 'Facebook Link'
        ];
        $setting2 = [
            'name' => 'tw' ,
            'en_content' => 'https://twitter.com',
            'ar_content' => '' ,
            'type' => 'url' ,
            'slug' => 'Twitter Link'
        ];
        $setting3 = [
            'name' => 'ln' ,
            'en_content' => 'https://linkedin.com',
            'ar_content' => '' ,
            'type' => 'url' ,
            'slug' => 'Linkedin Link'
        ];
        $setting4 = [
            'name' => 'sk' ,
            'en_content' => 'https://skype.com',
            'ar_content' => '' ,
            'type' => 'url' ,
            'slug' => 'Skype Link'
        ];
        $setting5 = [
            'name' => 'phone' ,
            'en_content' => '0112122373',
            'ar_content' => '' ,
            'type' => 'text' ,
            'slug' => 'Phone Number'
        ];
        $setting6 = [
            'name' => 'logo' ,
            'en_content' => 'uploads/partner',
            'ar_content' => '' ,
            'type' => 'file' ,
            'slug' => 'Logo'
        ];
        $setting7 = [
            'name' => 'poetoflio' ,
            'ar_content' => '',
            'en_content' => '',
            'type' => 'textarea' ,
            'slug' => 'Portoflio Description'
        ];
        $setting8 = [
            'name' => 'partner' ,
            'ar_content' => '',
            'en_content' => '',
            'type' => 'textarea' ,
            'slug' => 'Partner Description'
        ];
        $setting9 = [
            'name' => 'service' ,
            'ar_content' => '',
            'en_content' => '',
            'type' => 'textarea' ,
            'slug' => 'Service Description'
        ];
        $setting10 = [
            'name' => 'about' ,
            'ar_content' => '',
            'en_content' => '',
            'type' => 'textarea' ,
            'slug' => 'About Company'
        ];

        $setting::create($setting1);
        $setting::create($setting2);
        $setting::create($setting3);
        $setting::create($setting4);
        $setting::create($setting5);
        $setting::create($setting6);
        $setting::create($setting7);
        $setting::create($setting8);
        $setting::create($setting9);
        $setting::create($setting10);
    }
}
