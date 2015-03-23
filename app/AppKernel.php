<?php
use Kyoya\PhpJobRunner\Kernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Console\Input\ArgvInput;

class AppKernel extends Kernel
{
    /**
     * Loads the container configuration.
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     *
     * @api
     */
    public function loadApplicationConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

    /**
     * Loads the container configuration.
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     *
     * @api
     */
    public function loadContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/services.xml');
    }

    public function getEnvironment()
    {
        if (null === $this->environment) {
            $input             = new ArgvInput();
            $this->environment = $input->getParameterOption(array('--env', '-e'), getenv('PJR_ENV') ?: 'dev');
        }
    }
}
