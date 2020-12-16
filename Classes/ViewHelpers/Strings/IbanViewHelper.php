<?php
namespace Xima\XmViewhelper\ViewHelpers\Strings;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class IbanViewHelper
 *
 * Outputs a chunked easier to read iban string.
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/IbanViewHelper
 *
 * @example {xmvh:strings.iban(iban: '')}
 *
 * @package Xima\XmViewhelper\ViewHelpers\Strings
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class IbanViewHelper extends AbstractViewHelper
{
    /**
     * Iban
     *
     * @param $iban string
     * @return string
     */
    public function render($iban)
    {
        $rmWhitespaces = preg_replace('/\s+/', '', $iban);

        return chunk_split($rmWhitespaces, 4, ' ');
    }
}
