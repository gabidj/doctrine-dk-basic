<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

use function time;

class DoctrineHandler implements RequestHandlerInterface
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private function bootstrap()
    {

    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        exit;
        return new JsonResponse(['ack' => time()]);
    }
}
