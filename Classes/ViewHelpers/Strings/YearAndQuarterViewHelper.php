<?php
namespace Xima\XmViewhelper\ViewHelpers\Strings;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class YearAndQuarterViewHelper
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki
 *
 * @package Xima\XmViewhelper\ViewHelpers\Strings
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class YearAndQuarterViewHelper extends AbstractViewHelper
{
    /**
     * Outputs the current year and quarter as a string.
     *
     * @return string
     */
    public function render()
    {
        $currentMonth = date("m", time());
        $currentQuarter = ceil($currentMonth/3);
        $year = date('Y');

        return $year . ' Q' . $currentQuarter;
    }
}
