<?php

namespace App\Tests\Services;

use App\Services\PunkService;
use PHPUnit\Framework\TestCase;

class PunkServiceUnitTest extends TestCase{

    public function testGetBeer()
    {        
        $punkService = new PunkService();
        $resposeBeer = $punkService->getBeer('Cheesecake', true);
        $this->assertIsArray($resposeBeer);
    }

}