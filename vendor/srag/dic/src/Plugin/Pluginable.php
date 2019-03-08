<?php

namespace srag\DIC\SrMoveAssessmentToolbar\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\SrMoveAssessmentToolbar\Plugin
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
interface Pluginable {

	/**
	 * @return PluginInterface
	 */
	public function getPlugin()/*: PluginInterface*/
	;


	/**
	 * @param PluginInterface $plugin
	 */
	public function setPlugin(PluginInterface $plugin)/*: void*/
	;
}
