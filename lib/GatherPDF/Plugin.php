<?php

/**
 * Gather Digital PDF Generator
 */

namespace GatherPDF;

use Pimcore\API\Plugin as PluginLib;
use Pimcore\Db;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface
{

    public static function install()
    {
        return 'Already installed';
    }

    public static function uninstall()
    {
        return 'Cannot uninstall';
    }

    public static function isInstalled()
    {
        return true;
    }

}
