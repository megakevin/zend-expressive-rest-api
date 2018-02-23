<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

use App\Repository\VehicleMakeRepository;

class CreateVehicleMakeAction implements MiddlewareInterface
{
    private $repository;

    public function __construct(VehicleMakeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = $request->getParsedBody();

        $createdMake = $this->repository->create($data);

        return new JsonResponse([
            'createdMake' => $createdMake
        ]);
    }
}
