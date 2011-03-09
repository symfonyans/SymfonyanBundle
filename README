しんふぉにゃんを仕込むためのSymfony2バンドルです

1. install
$ git clone git://github.com/brtriver/SymfonyanBundle.git src/Acme/SymfonyanBundle

2. cofigure
if (in_array($this->getEnvironment(), array('dev', 'test'))) {
    $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
    $bundles[] = new Symfony\Bundle\WebConfiguratorBundle\SymfonyWebConfiguratorBundle();
    $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
    $bundles[] = new Acme\SymfonyanBundle\SymfonyanBundle(); // <= 追加
}

3. run command
$ ./app/console symfonyan:exception-install --symlink
$ ./app/console symfonyan:welcome-install --symlink
$ ./app/console assets:install web --symlink

4.uninstall
$ rm app/{FrameworkBundle,AcmeDemoBundle}
