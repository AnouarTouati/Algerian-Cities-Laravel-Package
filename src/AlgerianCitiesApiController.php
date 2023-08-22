<?php

namespace AnouarTouati\AlgerianCitiesLaravel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlgerianCitiesApiController extends Controller
{
    /**
     * returns the list of wilayas.
     */
    public function wilayas()
    {
        $data = AlgerianCities::wilayas();
        return response(json_encode($data),200)->withHeaders(['Content-Type'=>'application/json']);
    }
    /**
     * returns the list of dairas in the selected wilaya
     * @param mixed $wilaya could be a the name or code
     */
    public function dairas($wilaya)
    {
        if(is_numeric($wilaya)){
            $data = AlgerianCities::getDairasUsingWilayaCode($wilaya);
        }
        else{
            $data = AlgerianCities::getDairasUsingWilayaName($wilaya);
        }
        if(count($data) == 0){
            return response('Wrong wilaya code or name',400)->withHeaders(['Content-Type'=>'application/json']);
        }
        return response(json_encode($data),200)->withHeaders(['Content-Type'=>'application/json']);
    }

   /**
    * returns the list of communes in the selected daira
    * @param string $daira name of the daira
    */
    public function communes($daira){

        $data = AlgerianCities::getCommunesUsingDairaName($daira);
        if(count($data) == 0){
            return response('Wrong daira name',400)->withHeaders(['Content-Type'=>'application/json']);
        }
        return response(json_encode($data),200)->withHeaders(['Content-Type'=>'application/json']);
    }

    /**
     * returns the list of post offices in the selected commune
     * @param string $commune name of the commune
     */

     public function postOffices($commune){
        $data = AlgerianCities::getPostsUsingCommuneName($commune);
        if(count($data) == 0){
            return response('Wrong commune name',400)->withHeaders(['Content-Type'=>'application/json']);
        }
        return response(json_encode($data),200)->withHeaders(['Content-Type'=>'application/json']);
     }
}
