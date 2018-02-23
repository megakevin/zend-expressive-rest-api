<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

use App\Repository\VehicleMakeRepository;

class ListVehicleMakesAction implements MiddlewareInterface
{
    private $repository;

    public function __construct(VehicleMakeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return new JsonResponse([
            'makes' => $this->repository->getAll()
        ]);
    }
}
