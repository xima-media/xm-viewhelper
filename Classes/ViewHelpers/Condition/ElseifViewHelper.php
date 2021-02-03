<?php
namespace Xima\XmViewhelper\ViewHelpers\Condition;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class ElseifViewHelper
 *
 * Returns a conclusion according to the given conditions.
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/ElseifViewHelper
 *
 * @example {xmvh:conditions.elseif(condition1: '', condition2: '', conclusion1: '', conclusion2: '')}
 *
 * @package Xima\XmViewhelper\ViewHelpers\Strings
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class ElseifViewHelper extends AbstractViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('condition1', 'boolean',
            'First condition', true);
        $this->registerArgument('condition2', 'boolean',
            'Second condition', true);
        $this->registerArgument('conclusion1', 'boolean',
            'First conclusion', true);
        $this->registerArgument('conclusion2', 'boolean',
            'Second conclusion', true);
        $this->registerArgument('conclusion3', 'boolean',
            'Third optional conclusion', false);
    }

    /**
     * Elseif
     *
     * @return string
     */
    public function render()
    {
        $condition1 = $this->arguments['condition1'];
        $condition2 = $this->arguments['condition2'];
        $conclusion1 = $this->arguments['condition2'];
        $conclusion2 = $this->arguments['condition2'];
        if (isset($this->arguments['conclusion3'])) {
            $conclusion3 = $this->arguments['conclusion3'];
        } else {
            $conclusion3 = '';
        }

        $conclusion = '';

        if ($condition1) {
            $conclusion = $conclusion1;
        } elseif ($condition2) {
            $conclusion = $conclusion2;
        } else {
            $conclusion = $conclusion3;
        }
        return $conclusion;
    }
}
