<?php

namespace GatherPDF;

use GatherPDF\Plugin;

class Tool
{
    const TOOL_PATH = PIMCORE_PLUGINS_PATH . '/GatherPDF/tool/';

    public static function print($url, $path, $scale = 1)
    {
        $cmd = sprintf(
            'node %sindex.js --url %s --path %s --scale %s  2>&1',
            self::TOOL_PATH,
            $url,
            $path,
            $scale
        );

        $output = shell_exec($cmd);

        if (preg_match('/\[success\]$/', trim($output)) === 1) {
            return (object) [
                'success' => true,
            ];
        }
        else {
            return (object) [
                'success' => false,
                'error' => $output,
            ];
        }
    }

}
