しんふぉにゃんを仕込むためのSymfony2バンドルです
================================================

install
-------

git をお使いの場合は、次のコマンドを実行してインストールしてください。

::

    $ git clone git://github.com/symfonyans/SymfonyanBundle.git vendor/bundles/Acme/SymfonyanBundle

cofigure
--------

はじめに、\ `Acme` 名前空間の読み込みディレクトリを次のように追加します。Symfony2 Standard Edition の場合はデフォルトで `src` ディレクトリのみを探索するように設定されていますので、\ `vendor/bundles` ディレクトリも追加します。

::

    $loader->registerNamespaces(array(
        （・・・・）
        'Acme'             => array(__DIR__.'/../src', __DIR__.'/../vendor/bundles'),
    ));

次に、\ `app/AppKernel.php` ファイルを開き、\ `registerBundles()` メソッドでdev・test環境向けのバンドルを登録している部分に追加します。

::

    if (in_array($this->getEnvironment(), array('dev', 'test'))) {
        $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        $bundles[] = new Symfony\Bundle\WebConfiguratorBundle\SymfonyWebConfiguratorBundle();
        $bundles[] = new Acme\SymfonyanBundle\SymfonyanBundle(); // <= 追加
    }

run command
-----------

次のコマンドを実行して、カスタマイズ用のテンプレートを有効にします。

::

    $ ./app/console symfonyan:exception-install --symlink
    $ ./app/console symfonyan:welcome-install --symlink
    $ ./app/console assets:install web --symlink

すでに `app/Resources` ディレクトリに `FrameworkBundle` が存在する場合は削除されます。ご注意ください。

uninstall
---------

`app/Resources` ディレクトリ内に作られたカスタマイズ用のファイルを単に削除してください。

::

    $ rm app/Resources/{FrameworkBundle,AcmeDemoBundle}
