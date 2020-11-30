<?php
namespace Xima\XmViewhelper\ViewHelpers;

use FluidTYPO3\Vhs\ViewHelpers\Render\AbstractRenderViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

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
            'Path to default partial for default context', true);
        $this->registerArgument('variables', 'array',
            'Array of template variables', false);
        $this->registerArgument('partial2', 'string',
            'Path to partial if context negation matches', false);
        $this->registerArgument('contexts', 'array',
            'Array of contexts negations like Production/Standby', false);
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

        /** @var ConfigurationManager configurationManager */
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $extbaseFrameworkConfiguration = $configurationManager
            ->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        $settings = $extbaseFrameworkConfiguration['plugin.']['tx_xmviewhelper.']['settings.']['contentByContext.'];

        if (empty($partial2)) {
            $partial2 = $settings['partial2'];
        }

        if (empty($contexts)) {
            $contexts = $settings['contexts'];
        }

        $context = GeneralUtility::getApplicationContext()->__toString();
        $partial = (in_array($context, $contexts)) ? $partial2 : $partial1;

        $partial = GeneralUtility::getFileAbsFileName($partial);
        $view = static::getPreparedView();
        $view->setTemplatePathAndFilename($partial);
        if (!empty($variables)) {
            $view->assignMultiple($variables);
        }
        return static::renderView($view, $this->arguments);
    }
}
