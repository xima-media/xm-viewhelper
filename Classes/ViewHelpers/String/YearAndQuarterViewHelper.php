<?php
namespace Xima\XmViewhelper\ViewHelpers\String;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class YearAndQuarterViewHelper
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki
 *
 * @package Xima\XmViewhelper\ViewHelpers\String
 */
class YearAndQuarterViewHelper extends AbstractViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('date', 'DateTime',
            'DateTime object.', false);
    }

    /**
     * Outputs the year and quarter as a string
     * Of a given DateTime object or the current time
     *
     * @return string
     */
    public function render()
    {
        /** @var \DateTime $date */
        $date = $this->arguments['date'];

        $currentMonth = ($date) ? $date->format('m') : date('m', time());
        $year = ($date) ? $date->format('Y') : date('Y');

        $currentQuarter = ceil($currentMonth/3);

        return $year . ' Q' . $currentQuarter;
    }
}
