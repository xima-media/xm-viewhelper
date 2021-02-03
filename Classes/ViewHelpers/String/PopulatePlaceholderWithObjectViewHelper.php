<?php
namespace Xima\XmViewhelper\ViewHelpers\String;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class PopulatePlaceholderWithObjectViewHelper
 *
 * Populates a text containing {{placeholders}} with the corresponding values
 * from a given object.
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/PopulatePlaceholderWithObjectViewHelper
 *
 * @example {xmvh:strings.populatePlaceholderWithObject(text: '', object: object)}
 *
 * @package Xima\XmNnfdavPortal\ViewHelpers
 * @author Steve Lenz <steve.lenz@xima.de>
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class PopulatePlaceholderWithObjectViewHelper extends AbstractViewHelper
{

    /**
     * Arguments Initialization
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('text', 'string',
            'String containing placeholder.', true);
        $this->registerArgument('object', 'object', 'Variables to replace placeholders');
    }

    /**
     * Populate placeholder with object
     *
     * @return mixed|string|string[]
     * @throws \ReflectionException
     */
    public function render()
    {
        $startDelimiter = '{{';
        $endDelimiter = '}}';
        $text = $this->arguments['text'];
        $object = $this->arguments['object'];
        $reflection = new \ReflectionClass($object);
        $properties = $reflection->getProperties();

        /** @var \ReflectionProperty $property */
        foreach ($properties as $property) {
            $methodName = 'get' . ucfirst($property->getName());
            if (method_exists($object, $methodName)) {
                $text = str_replace($startDelimiter . $property->getName() . $endDelimiter, $object->{$methodName}(),
                    $text);
            }
        }

        return $text;
    }
}
