<?php
namespace AnouarTouati\AlgerianCitiesLaravel;

class AlgerianCities {

    public static function wilayas(){
        return PostOffice::select('wilaya_code','wilaya_name','wilaya_name_ascii')
                        ->distinct()
                        ->orderBy('wilaya_code','asc')
                        ->get();
    }

    public static function getDairasUsingWilayaCode($wilaya_code){
        return PostOffice::select('daira_name','daira_name_ascii')
                        ->distinct()
                        ->orderBy('daira_name_ascii','asc')
                        ->where('wilaya_code',$wilaya_code)
                        ->get();
    }
    public static function getDairasUsingWilayaName($wilaya_name){
        return PostOffice::select('daira_name','daira_name_ascii')
                        ->distinct()
                        ->orderBy('daira_name_ascii','asc')
                        ->where('wilaya_name',$wilaya_name)
                        ->orWhere('wilaya_name_ascii',$wilaya_name)
                        ->get();
    }
    public static function getCommunesUsingDairaName($daira_name){
        return PostOffice::select('commune_name','commune_name_ascii')
                        ->distinct()
                        ->orderBy('commune_name_ascii','asc')
                        ->where('daira_name',$daira_name)
                        ->orWhere('daira_name_ascii',$daira_name)
                        ->get();
    }
    public static function getPostsUsingCommuneName($commune_name){
        return PostOffice::select('post_code','post_name','post_name_ascii','post_address','post_address_ascii')
                        ->distinct()
                        ->orderBy('post_code','asc')
                        ->where('commune_name',$commune_name)
                        ->orWhere('commune_name_ascii',$commune_name)
                        ->get();
    }

    public static function getAllDairas(){
     return  PostOffice::select('daira_name','daira_name_ascii')
            ->distinct()
            ->orderBy('daira_name_ascii','asc')
            ->get();
    }
    public static function getAllCommunes(){
        return PostOffice::select('commune_name','commune_name_ascii')
        ->distinct()
        ->orderBy('commune_name_ascii','asc')
        ->get();
    }
}
