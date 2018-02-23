<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

use App\Repository\VehicleMakeRepository;

class GetVehicleMakeAction implements MiddlewareInterface
{
    private $repository;

    public function __construct(VehicleMakeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id', false);
        $make = $this->repository->getById($id);

        return new JsonResponse([
            'id' => $id,
            'make' => $make
        ]);
    }
}
