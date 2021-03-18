<?php
namespace Xima\XmViewhelper\ViewHelpers\String;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class IbanViewHelper
 *
 * Outputs a chunked easier to read iban string.
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/IbanViewHelper
 *
 * @example {xmvh:string.iban(iban: '')}
 *
 * @package Xima\XmViewhelper\ViewHelpers\Strings
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class IbanViewHelper extends AbstractViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('iban', 'string',
            'IBAN', true);
    }
    /**
     * Iban
     *
     * @return string
     */
    public function render()
    {
        $iban = $this->arguments['iban'];
        $rmWhitespaces = preg_replace('/\s+/', '', $iban);

        return chunk_split($rmWhitespaces, 4, ' ');
    }
}
