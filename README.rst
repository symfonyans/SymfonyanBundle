しんふぉにゃんを仕込むためのSymfony2バンドルです
================================================

install
-------

Symfonyのプロジェクトの composer.json の最後に以下を追加してください

::

    "require": {
        ....
        symfonyan/acme-symfonyan-bundle: "dev-master"
    },

cofigure
--------

次に、\ `app/AppKernel.php` ファイルを開き、\ `registerBundles()` メソッドでdev・test環境向けのバンドルを登録している部分に追加します。

::

    if (in_array($this->getEnvironment(), array('dev', 'test'))) {
        $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        $bundles[] = new Symfony\Bundle\WebConfiguratorBundle\SymfonyWebConfiguratorBundle();
        $bundles[] = new Acme\SymfonyanBundle\AcmeSymfonyanBundle(); // <= 追加
    }

run command
-----------

次のコマンドを実行して、カスタマイズ用のテンプレートを有効にします。

::

    $ ./app/console symfonyan:exception-install --symlink
    $ ./app/console symfonyan:welcome-install --symlink
    $ ./app/console assets:install web --symlink


uninstall
---------

`app/Resources` ディレクトリ内に作られたカスタマイズ用のファイルを単に削除してください。

::

    $ rm app/Resources/{TwigBundle,AcmeDemoBundle}
