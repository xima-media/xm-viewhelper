<?php
namespace Xima\XmViewhelper\ViewHelpers;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class ContextMatchesViewHelper
 *
 * Returns true if the given context matches the current Application Context
 *
 * @see https://github.com/xima-media/xm-viewhelper/wiki/ContextMatchesViewHelper
 *
 * @example {xmvh:contextMatches(contexts: {1: 'Production/Standby'})}
 *
 * @package Xima\XmViewhelper\ViewHelpers
 * @author Tony Lampel <tony.lampel@xima.de>
 */
class ContextMatchesViewHelper extends AbstractViewHelper
{
    /**
     * Arguments Initialization
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('contexts', 'array',
            'Array of contexts like Production/Standby', false);
    }

    /**
     * Context matches
     *
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        $contexts = (array) $this->arguments['contexts'];

        /** @var ConfigurationManager configurationManager */
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $extbaseFrameworkConfiguration = $configurationManager
            ->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        $settings = $extbaseFrameworkConfiguration['plugin.']['tx_xmviewhelper.']['settings.']['contextMatches.'];

        if (empty($contexts)) {
            $contexts = $settings['contexts'];
        }

        $context = (string)Environment::getContext();

        return in_array($context, $contexts);
    }
}
