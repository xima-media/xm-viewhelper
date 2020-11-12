<?php
namespace Xima\XmViewhelper\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class YearAndQuarterViewHelper
 *
 * @package Vendor\Project\ViewHelpers
 */
class YearAndQuarterViewHelper extends AbstractViewHelper
{
    /**
     * Outputs the current year and quarter as a string
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
