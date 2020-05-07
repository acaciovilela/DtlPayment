<?php

namespace DtlPayment;

use DtlPayment\Controller;
use Laminas\Router\Http\Literal;

return [
    'paypal' => [
        'client_id' => 'AdjAqQ3cy_9OVM48f2W4CXpmhFmADfRWGCy9_Xxsw6NQssn0HmNTTrAUKJp1N2F6VtbIMU0QmE-_JI2e',
        'client_secret' => 'EGbpHJCoL4Yy0_SbDUbU7a1x4SdQ71uut0cNU9e7N76yVeqmTIEXIWrF7I7L0E7-Qp5IXmAszTOl4Fbk',
        'redirect_uri' => 'https://rocker.com.br/app/payment/paypal/oauth',
        'api_token_uri' => 'https://api.sandbox.paypal.com/v1/oauth2/token',
    ],
    'controllers' => [
        'factories' => [
            Controller\PaypalController::class => Controller\Factory\PaypalControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'dtl-admin' => [
                'child_routes' => [
                    'dtl-payment' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/payment',
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'paypal' => [
                                'type' => Literal::class,
                                'options' => [
                                    'route' => '/paypal',
                                    'defaults' => [
                                        'controller' => Controller\PaypalController::class,
                                        'action' => 'index',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            [
                'label' => 'Dashboard',
                'route' => 'dtl-admin',
                'pages' => [
                    [
                        'label' => 'Pagamentos',
                        'route' => 'dtl-admin/dtl-payment',
                        'pages' => [
                            [
                                'label' => 'Paypal',
                                'route' => 'dtl-admin/dtl-payment/paypal'
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'admin' => [
            [
                'label' => 'Pagamentos',
                'route' => 'dtl-admin/dtl-payment',
                'pages' => [
                    [
                        'label' => 'Paypal',
                        'route' => 'dtl-admin/dtl-payment/paypal'
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'DtlPayment' => __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ],
            ],
        ],
    ],
];
