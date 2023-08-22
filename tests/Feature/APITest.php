<?php

namespace Tests\Feature;

use AnouarTouati\AlgerianCitiesLaravel\AlgerianCities;
use Tests\TestCase;

class APITest extends TestCase
{
    public function test_get_wilayas(): void
    {
        $response = $this->get('/api/algeriancities/wilayas');

        $response->assertStatus(200);
        $response->assertJsonCount(58);
        $response->assertJsonStructure([
            '*' => [
                'wilaya_code',
                'wilaya_name',
                'wilaya_name_ascii'
            ]
        ]);
    }

    public function test_get_dairas_using_wilaya_code(): void
    {
        for($i=1;$i<=58;$i++){
            $response = $this->get('/api/algeriancities/dairas/'.$i);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'daira_name',
                    'daira_name_ascii'
                ]
            ]);
        }
        
    }
    public function test_get_dairas_using_wilaya_code_unhappy(): void
    {
        $non_acceptable_codes = [-1,0,59,60];//subset of non acceptable codes, essentialy not in the range 1-58 inclusive  
        for($i=1;$i<count($non_acceptable_codes);$i++){
            $response = $this->get('/api/algeriancities/dairas/'.$non_acceptable_codes[$i]);

            $response->assertStatus(400);
        }
        
    }

    public function test_get_dairas_using_wilaya_name_ascii(): void
    {
        $wilayas = AlgerianCities::wilayas()->pluck('wilaya_name_ascii');
        foreach($wilayas as $wilaya){
            $response = $this->get('/api/algeriancities/dairas/'.$wilaya);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'daira_name',
                    'daira_name_ascii'
                ]
            ]);
        }
        
    }

    public function test_get_dairas_using_wilaya_name_ascii_unhappy(): void
    {
       
            $response = $this->get('/api/algeriancities/dairas/'.'somerandomname');

            $response->assertStatus(400);
    }

    public function test_get_dairas_using_wilaya_name(): void
    {
        $wilayas = AlgerianCities::wilayas()->pluck('wilaya_name');
        foreach($wilayas as $wilaya){
            $response = $this->get('/api/algeriancities/dairas/'.$wilaya);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'daira_name',
                    'daira_name_ascii'
                ]
            ]);
        }
        
    }

    public function test_get_dairas_using_wilaya_name_unhappy(): void
    {
            $response = $this->get('/api/algeriancities/dairas/'.'كلمةعشوائية');

            $response->assertStatus(400);
    }


    
    public function test_get_communes_using_daira_name_ascii(): void
    {
        $dairas = AlgerianCities::getAllDairas()->pluck('daira_name_ascii');
        foreach($dairas as $daira){
            //using withoutMiddleware to avoid throttle error
            $response = $this->withoutMiddleware()->get('/api/algeriancities/communes/'.$daira);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'commune_name',
                    'commune_name_ascii'
                ]
            ]);
        }
        
    }

    public function test_get_communes_using_daira_name_ascii_unhappy(): void
    {
       
            $response = $this->get('/api/algeriancities/communes/'.'somerandomname');

            $response->assertStatus(400);
    }

    public function test_get_communes_using_daira_name(): void
    {
        $dairas = AlgerianCities::getAllDairas()->pluck('daira_name');
        foreach($dairas as $daira){
            //using withoutMiddleware to avoid throttle error
            $response = $this->withoutMiddleware()->get('/api/algeriancities/communes/'.$daira);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'commune_name',
                    'commune_name_ascii'
                ]
            ]);
        }
        
    }

    public function test_get_communes_using_daira_name_unhappy(): void
    {
       
            $response = $this->get('/api/algeriancities/communes/'.'كلمةعشولئية');

            $response->assertStatus(400);
    }
    public function test_get_postoffices_using_commune_name_ascii(): void
    {
        $communes = AlgerianCities::getAllCommunes()->pluck('commune_name_ascii');
        foreach($communes as $commune){
            //using withoutMiddleware to avoid throttle
            $response = $this->withoutMiddleware()->get('/api/algeriancities/postoffices/'.$commune);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'post_code',
                    'post_name',
                    'post_name_ascii',
                    'post_address',
                    'post_address_ascii'
                ]
            ]);
        }
        
    }

    public function test_get_postoffices_using_commune_name_ascii_unhappy(): void
    {
            $response = $this->get('/api/algeriancities/postoffices/'.'somerandomname');

            $response->assertStatus(400);
    }
    public function test_get_postoffices_using_commune_name(): void
    {
        $communes = AlgerianCities::getAllCommunes()->pluck('commune_name');
        foreach($communes as $commune){
            //using withoutMiddleware to avoid throttle
            $response = $this->withoutMiddleware()->get('/api/algeriancities/postoffices/'.$commune);

            $response->assertStatus(200);
            $response->assertJsonStructure([
                '*' => [
                    'post_code',
                    'post_name',
                    'post_name_ascii',
                    'post_address',
                    'post_address_ascii'
                ]
            ]);
        }
        
    }

    public function test_get_postoffices_using_commune_name_unhappy(): void
    {
       
            $response = $this->get('/api/algeriancities/postoffices/'.'كلمةعشولئية');

            $response->assertStatus(400);
    }
}
