<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PunkControllerTest extends WebTestCase{

    public function testEndpoint() 
    {
        $client = static::createClient();
        $client->request('GET', '/punk');  
        $this->assertResponseIsSuccessful();
  //      $this->assertSelectorTextContains('h1', 'Hello World');
    //   $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}