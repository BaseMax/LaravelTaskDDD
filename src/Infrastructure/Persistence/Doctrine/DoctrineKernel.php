<?php

namespace App\Infrastructure\Persistence\Doctrine;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\WebServerBundle\WebServerBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\XmlFileLoader as RoutingXmlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

class DoctrineKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new DoctrineBundle(),
            new DoctrineMigrationsBundle(),
            new SecurityBundle(),
            new WebServerBundle(),
        ];
    }

    public function registerContainerConfiguration(ContainerBuilder $container, $loader)
    {
        $loader->load(__DIR__.'/../../config/packages/*.xml');

        $fileLocator = new FileLocator(__DIR__.'/../../config/');
        $loader = new XmlFileLoader($container, $fileLocator);
        $loader->load('services.xml');
    }

    protected function configureRoutes(RouteCollection $routes)
    {
        $fileLocator = new FileLocator(__DIR__.'/../../config/');
        $loader = new RoutingXmlFileLoader($routes, $fileLocator);
        $loader->load('routes.xml');
    }

    public function getCacheDir()
    {
        return $this->getProjectDir().'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return $this->getProjectDir().'/var/log/'.$this->getEnvironment();
    }
}
