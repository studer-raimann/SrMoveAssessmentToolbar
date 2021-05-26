<?php

namespace srag\DIC\SrMoveAssessmentToolbar\Version;

use ilUtil;
use srag\DIC\SrMoveAssessmentToolbar\DICTrait;
use srag\DIC\SrMoveAssessmentToolbar\Plugin\Pluginable;
use srag\DIC\SrMoveAssessmentToolbar\Plugin\PluginInterface;

/**
 * Class PluginVersionParameter
 *
 * @package srag\DIC\SrMoveAssessmentToolbar\Version
 */
final class PluginVersionParameter implements Pluginable
{

    use DICTrait;

    /**
     * @var PluginInterface|null
     */
    protected $plugin = null;


    /**
     * PluginVersionParameter constructor
     */
    private function __construct()
    {

    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        return new self();
    }


    /**
     * @param string      $prod_url
     * @param string|null $dev_url
     *
     * @return string
     */
    public function appendToUrl(string $prod_url, /*?*/ string $dev_url = null) : string
    {
        if (!empty($dev_url) && $this->isDevMode()) {
            $url = $dev_url;
        } else {
            $url = $prod_url;
        }

        if ($this->plugin === null) {
            return $url;
        }

        $params = [
            "version" => $this->plugin->getPluginObject()->getVersion()
        ];

        $hash = hash("sha256", base64_encode(json_encode($params)));

        return ilUtil::appendUrlParameterString($url, "plugin_version=" . $hash);
    }


    /**
     * @inheritDoc
     */
    public function getPlugin() : PluginInterface
    {
        return $this->plugin;
    }


    /**
     * @inheritDoc
     */
    public function withPlugin(PluginInterface $plugin) : self
    {
        $this->plugin = $plugin;

        return $this;
    }


    /**
     * @return bool
     */
    protected function isDevMode() : bool
    {
        return (defined("DEVMODE") && intval(DEVMODE) === 1);
    }
}
