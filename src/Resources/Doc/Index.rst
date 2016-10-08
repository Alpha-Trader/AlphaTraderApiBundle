Getting Started With AlphatraderApiBundle
=========================================

This Bundle provides methods for accessing the Alphatrader API.
Till now just a few are supported.

Prerequisites
-------------

This version of the bundle requires Symfony 2.7+.

Installation
------------

1. Download AlphatraderApiBundle using composer
2. Enable the Bundle
3. Configure your application's config.yml

Step 1: Download AlphatraderApiBundle using composer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Require the bundle with composer:

.. code-block:: bash

    $ composer require alphatrader/apibundle "~1.0@dev"

Composer will install the bundle to your project's ``vendor/alphatrader/apibundle`` directory.

Step 2: Enable the bundle
~~~~~~~~~~~~~~~~~~~~~~~~~

Enable the bundle in the kernel::

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Alphatrader\ApiBundle\AlphatraderApiBundle(),
            // ...
        );
    }

Step 3: Configure your application's config.yml
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Below is a minimal example of the configuration necessary to use the AlphatraderApiBundle
in your application:

.. code-block:: yaml

    # app/config/config.yml
    alphatrader_api:
        apiurl: http://stable.alpha-trader.com
        username: <username>
        password: <password>
        authid: <partnerid>
        jwt: <jwttoken>

Optional:
~~~~~~~~~

At Your UserLogin save token through:
.. code-block:: php
$session->set('_attoken',<yourtoken>);