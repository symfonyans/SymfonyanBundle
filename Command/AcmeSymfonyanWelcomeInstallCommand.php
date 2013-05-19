<?php
namespace Acme\SymfonyanBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Command\Command;

/**
 * SymfonyanExcepotionInstallCommand.
 *
 * @author brtriver <brt.river@gmail.com>
 */
class AcmeSymfonyanWelcomeInstallCommand extends Command
{
    protected $container;

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->container = $this->getApplication()->getKernel()->getContainer();
    }
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->addOption('symlink', null, InputOption::VALUE_NONE, 'Symlinks the welcome page instead of copying it')
            ->setName('symfonyan:welcome-install')
            ->setDescription('Change the welcome page to Symfonyan')
        ;
    }

    /**
     * @see Command
     *
     * @throws \InvalidArgumentException When the target directory does not exist
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filesystem = $this->container->get('filesystem');

        // Create the bundles directory otherwise symlink will fail.
        if (is_dir($originDir = __DIR__.'/../Resources/views/AcmeDemoBundle')) {
            $output->writeln(sprintf('Installing symfonyan welcomepage to <comment>app/Resources/AcmeDemoBundle</comment>'));

            $targetDir = $this->container->getParameter('kernel.root_dir').'/Resources/AcmeDemoBundle';

            $filesystem->remove($targetDir);

            if ($input->getOption('symlink')) {
                $filesystem->symlink($originDir, $targetDir);
            } else {
                $filesystem->mkdir($targetDir, 0777);
                $filesystem->mirror($originDir, $targetDir);
            }
        }
    }
}
