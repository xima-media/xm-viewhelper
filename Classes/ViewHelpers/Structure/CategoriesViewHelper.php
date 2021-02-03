<?php
namespace Xima\XmViewhelper\ViewHelpers\Structure;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use Xima\XmTools\Domain\Repository\CategoryRepository;

/**
 * Class CategoriesViewHelper
 *
 * @author (c) 2019 OpenSource Team, XIMA MEDIA GmbH, osdev@xima.de
 *
 * @package Xima\XmViewhelper\ViewHelpers\Structure
 */
class CategoriesViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @throws \TYPO3Fluid\Fluid\Core\ViewHelper\Exception
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('uid', 'integer', 'UID of the record', true);
        $this->registerArgument('table', 'string', 'Table of the record', true);
        $this->registerArgument('field', 'string', 'Field name which holds the categories in the origin table', false,
            'categories');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return array|mixed
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $catRepo = $objectManager->get(CategoryRepository::class);

        $categories = $catRepo->findByTableAndFieldname(
            $arguments['table'],
            $arguments['field'],
            $arguments['uid']
        );

        return $categories;
    }

    protected function buildRenderChildrenClosure()
    {
        // TODO: Implement buildRenderChildrenClosure() method.
    }
}
