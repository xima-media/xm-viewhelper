<?php
namespace Xima\XmViewhelper\ViewHelpers\Arrays;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class ArrayFromDelimiterStringViewHelper
 *
 * @package Xima\XmViewhelper\ViewHelpers\Arrays
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class ArrayFromDelimiterStringViewHelper extends AbstractViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments()
    {
        $this->registerArgument('string', 'string',
            'String to be parsed.', true);
        $this->registerArgument('delimiter', 'string',
            'Value delimiter.', true);
        $this->registerArgument('ignore', 'string',
            'Indicator to ignore value.', false);
    }

    /**
     * Outputs an array from a given string containing delimiters.
     *
     * @return mixed
     * @throws \Exception
     */
    public function render()
    {
        $serializedString = $this->arguments['string'];
        $delimiter = $this->arguments['delimiter'];

        if (isset($this->arguments['ignore'])) {
            $ignore = $this->arguments['ignore'];
        }

        $values = explode($delimiter, $serializedString);

        $trimmedValues = array_map('trim', $values);

        foreach ($trimmedValues as $key => &$value) {
            if (isset($ignore) && mb_substr($value, 0, 1, 'utf-8') == $ignore) {
                unset($trimmedValues[$key]);
            }
        }

        return $trimmedValues;
    }
}
