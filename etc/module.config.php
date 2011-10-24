<?php
return array(
    'di' => array(
        'definition' => array(
            'class' => array(
                'SpiffyDoctrine\Factory\EntityManager' => array(
                    'instantiator' => array('SpiffyDoctrine\Factory\EntityManager', 'create'),
                    'methods' => array(
                        'create' => array(
                            'name' => array(
                                'type' => 'array',
                                'required' => true
                            ),
                            'container' => array(
                                'type' => 'SpiffyDoctrine\Container\Container',
                                'required' => true
                            )
                        ),
                    )
                )
            ),
        ),
        'instance' => array(
            'alias' => array(
                'doctrine-container' => 'SpiffyDoctrine\Container\Container',
                'em-default' => 'SpiffyDoctrine\Factory\EntityManager'
            ),
            'em-default' => array(
                'parameters' => array(
                    'name' => 'default',
                    'container' => 'doctrine-container'
                )
            ),
            'doctrine-container' => array(
                'parameters' => array(
                    'connection' => array(
                        'default' => array(
                            'evm' => 'default',
                            'dbname' => 'blitzaroo',
                            'user' => 'root',
                            'password' => '',
                            'host' => 'localhost',
                            'driver' => 'pdo_mysql'
                        )
                    ),
                    'cache' => array(
                        'default' => array(
                            'class' => 'Doctrine\Common\Cache\ArrayCache'
                        )
                    ),
                    'evm' => array(
                        'default' => array(
                            'class' => 'Doctrine\Common\EventManager',
                            'subscribers' => array()
                        )
                    ),
                    'em' => array(
                        'default' => array(
                            'cache' => array(
                                'metadata' => 'default',
                                'query' => 'default',
                                'result' => 'default'
                            ),
                            'connection' => 'default',
                            'logger' => null,
                            'proxy' => array(
                                'generate' => true,
                                'dir' => __DIR__ . '/../src/Proxy',
                                'namespace' => 'SpiffyDoctrine\Proxy'
                            ),
                            'registry' => array(
                                'files' => array(
                                    __DIR__ . '/../lib/doctrine-orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
                                ),
                                'namespaces' => array()
                            ),
                            'driver' => array(
                                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                                'paths' => array(),
                                'reader' => array(
                                    'class' => 'Doctrine\Common\Annotations\AnnotationReader',
                                    'aliases' => array()
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);