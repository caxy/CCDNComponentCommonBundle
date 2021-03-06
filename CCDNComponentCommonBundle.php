<?php

/*
 * This file is part of the CCDNComponent CommonBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\CommonBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use CCDNComponent\CommonBundle\DependencyInjection\Compiler\MenuBuilderCompilerPass;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class CCDNComponentCommonBundle extends Bundle
{
	
	/**
	 *
	 * @access public
	 */
	public function boot()
	{
		$route = $this->container->getParameter('ccdn_component_common.header.brand.route');
		
		if (strlen($route) && $route != '#') {
			$path = $this->container->get('router')->generate($route);
		} else {
			$path = '#';
		}
		
		$twig = $this->container->get('twig');
		$twig->addGlobal('ccdn_component_common', array(
			'header' => array(
				'brand' => array(
					'route' => $path,
					'label' => $this->container->getParameter('ccdn_component_common.header.brand.label'),
				),
			),
		));
	}
}
