<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alphatrader\ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package AlphaTrader\ApiBundle\DependencyInjection
 * @author Tr0nYx <tronyx@bric.finance>
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('alphatrader_api');

        $rootNode
            ->children()
            ->scalarNode('username')->end()
            ->scalarNode('password')->end()
            ->scalarNode('authid')->end()
            ->scalarNode('apiurl')->end()
            ->scalarNode('jwt')->defaultNull()->end()
            ->end();

        return $treeBuilder;
    }
}
