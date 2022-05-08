<?php

namespace App\Controller;

use App\Services\PunkService;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PunkController
{
    private $punkService;

    public function __construct(PunkService $punkService) {
        $this->punkService = $punkService;
    }

    /**
     * @Route("/punk", methods={"GET"})
     */
    public function show(Request $request)
    {
        try{
            $food = $request->get('food');
            $details = $request->get('details');
            $response= new JsonResponse();
            $food=$this->validateParam($food);
            $beer=$this->punkService->getBeer($food,$details);

            $response->setData([
                'success' => true,
                'code' => '200',
                'data' => $beer
            ]);
            return $response;

        } catch (Exception $e) {
            $response->setData([
                'success' => false,
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]);
            return $response;
        }
    }

    public function validateParam($food)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($food, [
            new Length(['min' => 2]),
            new NotBlank(),
        ]);
        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                $message= $violation->getMessage().'->food';
            }
            throw new Exception($message, 401);
        }else{            
           return str_replace(" ", "_",$food);
        }
    }    

}