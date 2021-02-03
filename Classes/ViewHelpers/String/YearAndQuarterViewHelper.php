<?php
namespace Xima\XmViewhelper\ViewHelpers\String;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class YearAndQuarterViewHelper
 *
 * Outputs the current year and quarter as a string.
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/YearAndQuarterViewHelper
 *
 * @example {xmvh:strings.yearAndQuarter()}
 *
 * @package Xima\XmViewhelper\ViewHelpers\Strings
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class YearAndQuarterViewHelper extends AbstractViewHelper
{
    /**
     * Year and quarter
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
