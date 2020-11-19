<?php
namespace Xima\XmViewhelper\ViewHelpers;

use FluidTYPO3\Vhs\ViewHelpers\Render\AbstractRenderViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ContentByContextViewHelper
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki
 *
 * @package Xima\XmViewhelper\ViewHelpers
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class ContentByContextViewHelper extends AbstractRenderViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments()
    {
        $this->registerArgument('partial1', 'string',
            'Path to partial if context matches', false);
        $this->registerArgument('variables', 'array',
            'Array of template variables', false);
        $this->registerArgument('partial2', 'string',
            'Path to partial if context does not match', false);
        $this->registerArgument('contexts', 'array',
            'Array of contexts', false);
    }

    /**
     * Returns rendered partial according to application context.
     *
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        $partial1 = $this->arguments['partial1'];
        $variables = (array) $this->arguments['variables'];
        $partial2 = $this->arguments['partial2'];
        $contexts = (array) $this->arguments['contexts'];

        // Todo: Global Typoscript settings for partial2 and contexts

        $context = GeneralUtility::getApplicationContext()->__toString();
        $partial = (in_array($context, $contexts))? $partial1 : $partial2;

        $partial = GeneralUtility::getFileAbsFileName($partial);
        $view = static::getPreparedView();
        $view->setTemplatePathAndFilename($partial);
        if (!empty($variables)) {
            $view->assignMultiple($variables);
        }
        return static::renderView($view, $this->arguments);
    }
}
