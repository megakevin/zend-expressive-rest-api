<?php

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                Action\PingAction::class => Action\PingAction::class,
                Repository\VehicleMakeRepository::class => Repository\VehicleMakeRepository::class
            ],
            'factories'  => [
                Action\HomePageAction::class => Action\HomePageFactory::class,
                Action\ListVehicleMakesAction::class => function ($container) {
                    return new Action\ListVehicleMakesAction(
                        $container->get(Repository\VehicleMakeRepository::class)
                    );
                },
                Action\GetVehicleMakeAction::class => function ($container) {
                    return new Action\GetVehicleMakeAction(
                        $container->get(Repository\VehicleMakeRepository::class)
                    );
                },
                Action\CreateVehicleMakeAction::class => function ($container) {
                    return new Action\CreateVehicleMakeAction(
                        $container->get(Repository\VehicleMakeRepository::class)
                    );
                },
                Action\UpdateVehicleMakeAction::class => function ($container) {
                    return new Action\UpdateVehicleMakeAction(
                        $container->get(Repository\VehicleMakeRepository::class)
                    );
                },
                Action\DeleteVehicleMakeAction::class => function ($container) {
                    return new Action\DeleteVehicleMakeAction(
                        $container->get(Repository\VehicleMakeRepository::class)
                    );
                },
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app'    => ['templates/app'],
                'error'  => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }
}
