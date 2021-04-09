<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis iste natus error sit voluptatem Excepteu

                            sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspi deserunt mollit anim id est laborum. sed ut perspi.",
            'short_des'=>"Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"عمان - الاردن",
            'email'=>"MicroJo@gmail.com",
            'phone'=>"٠٧٩٩٦٥٤٧٣٩",
            'title'=>"MicroJo",
            'facebook'=>"microjo.facebook",
            'twitter'=>"microjo.twitter",
            'insta'=>"insta.microjo",
            'opentime'=>"٨ صباحاً - ٨ مساءاً",
            'googlmap'=>"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d211.30865833002994!2d36.112331596329895!3d32.070911200000026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2sjo!4v1617966614190!5m2!1sar!2sjo",
            'meta'=>"mcirjo,sooq,dokaneh,moshtreat"
        );
        DB::table('settings')->insert($data);
    }
}
