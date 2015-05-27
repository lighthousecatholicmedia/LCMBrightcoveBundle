<?php

namespace LCM\BrightcoveBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
  /**
   * {@inheritdoc}
   */
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('lcm_brightcove');

    $rootNode
      ->children()
        ->arrayNode('account')
          ->children()
            ->scalarNode('id')->isRequired()->cannotBeEmpty()->end()
          ->end()
        ->end() // account
        ->arrayNode('client')
          ->children()
            ->scalarNode('id')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('secret')->isRequired()->cannotBeEmpty()->end()
          ->end()
        ->end() // client
      ->end();

    return $treeBuilder;
  }
}
