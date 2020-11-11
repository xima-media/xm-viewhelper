<?php declare(strict_types=1);

namespace Xima\XmViewhelper;


/**
 * Class Configuration
 *
 * This file contains global configurations like constants and static methods for usage in whole extension.
 *
 * @package Xima\XmViewhelper
 */
class Configuration
{

    const EXT_NAME = 'XmViewhelper';
    const EXT_KEY = 'xm_viewhelper';

    /**
     * Cache
     */
    const CACHE_IDENTIFIER = '{{ExtKeyNamespace}}Cache';
    const CACHE_LIFETIME = 86400;

}
