<?php

namespace DtlPayment\Controller\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use DtlPayment\Controller\PaypalController;

class PaypalControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $controller = new PaypalController();
        return $controller;
    }

}
