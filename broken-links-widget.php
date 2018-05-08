<?php

/**
* A Kirby panel-widget which shows broken links within the pages.
*
* @package   Kirby CMS
* @author    Dennis Kerzig <hi@wottpal.com>
* @version   0.5.0
*
*/


$kirby->set('widget', 'broken-links', __DIR__ . DS . 'broken-links');


/**
 * Load languages for the plugin.
 *
 * @throws Exception
 */
function loadBlinksTranslation()
{
    if (defined('KIRBY')) {
        $site = kirby()->site();
        $code = $site->multilang() ? $site->language()->code() : $site->user()->language();
        if (!$code) $code = 'en';

        try {
            include_once __DIR__ . DS . 'languages' . DS . $code . '.php';
        } catch (ErrorException $e) {
            try {
                include_once __DIR__ . DS . 'languages' . DS . 'en' . '.php';
            } catch (ErrorException $e) {
                throw new Exception("This plugin does not have a translation for the language '$code'.");
            }
        }
    }
}
