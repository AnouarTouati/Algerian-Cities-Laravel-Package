# Algerian Cities Laravel Package
Grew tired of repeating the same step in every project to add address to your forms. I had the same frustration, which why I made this package to get you up and running with just few commands.
# Acknowledgment
[Dataset was taken from this repo](https://github.com/othmanus/algeria-cities)
# Status
This package is still under development. Use at your own discretion. You can open an issue for bugs or features you would like to be included in the future. 
# Instalation

```php
composer require  anouar-touati/algerian-cities-laravel:v1.*@BETA
```
```php
php artisan migrate
```
```php
php artisan db:seed --class="AnouarTouati\AlgerianCitiesLaravel\Database\Seeders\AlgerianCitiesSeeder"
```
If auto discovery does not work for you, add this under providers in config/app.php  : 
```
AnouarTouati\AlgerianCitiesLaravel\AlgerianCitiesServiceProvider::class
```
# Usage
## API
Call these json endpoints

| Verb | URI | Description |
| :--- | :---: | ---: | 
| Get  | /api/algeriancities/wilayas | Get all wilayas | 
#### response format :
```json
[
    {
        "wilaya_code": 3,
        "wilaya_name": "الأغواط",
        "wilaya_name_ascii": "Laghouat"
    },
    {
        "wilaya_code": 4,
        "wilaya_name": "أم البواقي",
        "wilaya_name_ascii": "Oum El Bouaghi"
    },

]
```     

| Verb | URI | Description |
| :--- | :---: | ---: | 
| Get  | /api/algeriancities/dairas/{wilaya} | Get all dairas at the specified wilaya code or name (arabic or french) | 
#### response format :
```json
[
    {
        "daira_name": "المنيعة",
        "daira_name_ascii": "El Menia"
    },
    {
        "daira_name": "المنصورة",
        "daira_name_ascii": "Mansourah"
    },

]
 ```
 | Verb | URI | Description |
| :--- | :---: | ---: | 
| Get  | /api/algeriancities/communes/{daira} | Get all communes at the specified daira name (arabic or french) | 
#### response format :
```json
[
    {
        "commune_name": "بئر مراد رايس",
        "commune_name_ascii": "Bir Mourad Rais"
    },
    {
        "commune_name": "بئر خادم",
        "commune_name_ascii": "Birkhadem"
    },

]
 ```       
  | Verb | URI | Description |
| :--- | :---: | ---: | 
| Get  | /api/algeriancities/communes/{commune} | Get all post offices at the specified commune name (arabic or french) | 
#### response format :
```json
[
    {
        "post_code": 35000,
        "post_name": "بومرداس - القباضة الرئيسية",
        "post_name_ascii": "Boumerdes",
        "post_address": "بومرداس - حي 408 مسكن",
        "post_address_ascii": "Cité 408 Logements Boumerdes"
    },
    {
        "post_code": 35007,
        "post_name": "بومرداس - فرانتز فانون",
        "post_name_ascii": "Boumerdes Frantz Fanon",
        "post_address": "بومرداس - حي 350 مسكن",
        "post_address_ascii": "Cité 350 Logements Boumerdes"
    },

]
 ```
 ## Use through the Facade AlgerianCities
 you can use the methods that the API controller is built with by including this line to the top of your file :

 ```php 
 use AnouarTouati\AlgerianCitiesLaravel\AlgerianCities;
 ```
 All of these methods return a Collection
| Mehod | Parameters | Description |
| :---  | :---:      | ---:        | 
| getAllWilayas()|         |returns all wilayas|
|getDairasUsingWilayaCode() | $wilaya_code | get list of dairas using wilaya's code|
|getDairasUsingWilayaName() | $wilaya_name | get list of dairas using wilaya's name in arabic or french|
|getCommunesUsingDairaName() | $daira_name | get list of communes using daira's name in arabic or french|
|getPostsUsingCommuneName() | $commune_name | get list of post offices using commune's name in arabic or french|
|getAllDairas() |  | get list of all dairas|
|getAllCommunes() |  | get list of all communes|