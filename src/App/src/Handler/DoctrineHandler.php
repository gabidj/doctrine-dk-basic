<?php

declare(strict_types=1);

namespace App\Handler;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Dot\User\Entity\RoleEntity;
use Dot\User\Entity\UserEntity;
use Dot\User\Mapper\UserDoctrineMapper;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class DoctrineHandler implements RequestHandlerInterface
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     *
     */
    private function bootstrap()
    {
        /*
            dbname:               database
            host:                 localhost
            port:                 1234
            user:                 user
            password:             secret
            driver:               pdo_mysql
        */
        $containerConfig = $this->container->get('config');
        $dbC = $containerConfig['db']['adapters']['database'];
        $conn = [
            'dbname' => $dbC['database'],
            'host' => $dbC['hostname'],
            'user' => $dbC['username'],
            'password' => $dbC['password'],
            'driver' => strtolower($dbC['driver']),
        ];
        $path = dirname(__DIR__, 3).'/Dot/src';
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration([$path], true);
        $this->entityManager = EntityManager::create($conn, $doctrineConfig);
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $this->bootstrap();
        $data = [];

        $userMapper = new UserDoctrineMapper($this->entityManager);
        $data = $userMapper->getByEmail('gabi@dot.com');
        $data = $userMapper->get(3);
        /*//
        $userRepo = $this->entityManager->getRepository(UserEntity::class);
        $data = [];
        $data = $userRepo->findAll();
        //*/
        // $data = $this->entityManager->getRepository(RoleEntity::class)->findAll();
        return new JsonResponse($data);
    }
}
