<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class PunkService
{ 
   
    public function getBeer($food,$details)
    {
        $client = new Client();
        $response = $client->request('GET', $_ENV["URL_API"].'?food='.$food);
        $beers = json_decode($response->getBody(), true);  
        if(count($beers)<=0) {
            throw new Exception('BEER_NOT_FOUND', 404);
        }
        
        foreach ($beers as $beer){
            if($details){
                $resposeBeer[]=[
                    "id" => $beer['id'],
                    "name" => $beer['name'],
                    "description" => $beer['description'],
                    "image_url" => $beer['image_url'],
                    "tagline" => $beer['tagline'],
                    "first_brewed" => $beer['first_brewed'],
                ];
            }else{
                $resposeBeer[]=[
                    "id" => $beer['id'],
                    "name" => $beer['name'],
                    "description" => $beer['description']
                ];
            }
        }
        return $resposeBeer;
    }
}