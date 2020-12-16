<?php
namespace Xima\XmViewhelper\ViewHelpers\Strings;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class PopulatePlaceholderWithArrayViewHelper
 *
 * Populates a text containing {{placeholders}} with the corresponding values
 * from a given array.
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/PopulatePlaceholderWithArrayViewHelper
 *
 * @example {xmvh:strings.populatePlaceholderWithArray(text: '', array: array)}
 *
 * @package Xima\XmViewhelper\ViewHelpers\Strings
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class PopulatePlaceholderWithArrayViewHelper extends AbstractViewHelper
{

    /**
     * Arguments Initialization
     */
    public function initializeArguments()
    {
        $this->registerArgument('text', 'string',
            'String containing placeholder.', true);
        $this->registerArgument('array', 'array', 'Variables to replace placeholders');
    }

    /**
     * Populates placeholder with array
     *
     * @return mixed
     */
    public function render()
    {
        $startDelimiter = '{{';
        $endDelimiter = '}}';
        $text = $this->arguments['text'];
        $array = $this->arguments['array'];

        foreach ($array as $key => $value) {
            $text = str_replace($startDelimiter . $key . $endDelimiter, $value, $text);
        }

        return $text;
    }
}
