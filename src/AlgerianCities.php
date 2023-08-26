<?php
namespace AnouarTouati\AlgerianCitiesLaravel;

class AlgerianCities {

    public function getAllWilayas(){
        return PostOffice::select('wilaya_code','wilaya_name','wilaya_name_ascii')
                        ->distinct()
                        ->orderBy('wilaya_code','asc')
                        ->get();
    }

    public function getDairasUsingWilayaCode($wilaya_code){
        return PostOffice::select('daira_name','daira_name_ascii')
                        ->distinct()
                        ->orderBy('daira_name_ascii','asc')
                        ->where('wilaya_code',$wilaya_code)
                        ->get();
    }
    public function getDairasUsingWilayaName($wilaya_name){
        return PostOffice::select('daira_name','daira_name_ascii')
                        ->distinct()
                        ->orderBy('daira_name_ascii','asc')
                        ->where('wilaya_name',$wilaya_name)
                        ->orWhere('wilaya_name_ascii',$wilaya_name)
                        ->get();
    }
    public function getCommunesUsingDairaName($daira_name){
        return PostOffice::select('commune_name','commune_name_ascii')
                        ->distinct()
                        ->orderBy('commune_name_ascii','asc')
                        ->where('daira_name',$daira_name)
                        ->orWhere('daira_name_ascii',$daira_name)
                        ->get();
    }
    public function getPostsUsingCommuneName($commune_name){
        return PostOffice::select('post_code','post_name','post_name_ascii','post_address','post_address_ascii')
                        ->distinct()
                        ->orderBy('post_code','asc')
                        ->where('commune_name',$commune_name)
                        ->orWhere('commune_name_ascii',$commune_name)
                        ->get();
    }

    public function getAllDairas(){
     return  PostOffice::select('daira_name','daira_name_ascii')
            ->distinct()
            ->orderBy('daira_name_ascii','asc')
            ->get();
    }
    public function getAllCommunes(){
        return PostOffice::select('commune_name','commune_name_ascii')
        ->distinct()
        ->orderBy('commune_name_ascii','asc')
        ->get();
    }
}
