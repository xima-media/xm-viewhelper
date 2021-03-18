<?php

namespace Xima\XmViewhelper\ViewHelpers\String;

/**
 * Class BasenameViewHelper
 *
 * Returns the trailing path of given url
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/BasenameViewHelper
 *
 * @example {xmvh:string.basename(url: '')}
 *
 * @package Xima\XmViewhelper\ViewHelpers\String
 */
class BasenameViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('url', 'string',
            'Url containing the path to be fetched', true);
    }
    /**
     * Returns the trailing path of given url
     *
     * @return string
     */
    public function render(): string
    {
        $url = $this->arguments['url'];
        return basename($url);
    }
}
