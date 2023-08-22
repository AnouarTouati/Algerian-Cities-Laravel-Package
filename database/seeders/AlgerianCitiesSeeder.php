<?php
namespace AnouarTouati\AlgerianCitiesLaravel\Database\Seeders;

use AnouarTouati\AlgerianCitiesLaravel\PostOffice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlgerianCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $path = __DIR__ . '/algeria_postcodes.json';
        $raw = file_get_contents($path);
        $data = json_decode($raw,true);
       
        foreach($data as $entry){
            $post_office = new PostOffice();
            $post_office->commune_id = $entry['commune_id'];
            $post_office->commune_name = $entry['commune_name'];
            $post_office->commune_name_ascii = $entry['commune_name_ascii'];
            $post_office->daira_name = $entry['daira_name'];
            $post_office->daira_name_ascii = $entry['daira_name_ascii'];
            $post_office->wilaya_code = $entry['wilaya_code'];
            $post_office->wilaya_name = $entry['wilaya_name'];
            $post_office->wilaya_name_ascii = $entry['wilaya_name_ascii'];
            $post_office->post_code = $entry['post_code'] != '' ? $entry['post_code'] : NULL;
            $post_office->post_name = $entry['post_name'];
            $post_office->post_name_ascii = $entry['post_name_ascii'];
            $post_office->post_address = $entry['post_address'];
            $post_office->post_address_ascii = $entry['post_address_ascii'] ?? '';
            $post_office->save();
        }
    }
}
