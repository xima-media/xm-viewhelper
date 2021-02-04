<?php
namespace Xima\XmViewhelper\ViewHelpers\Structure;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use Xima\XmViewhelper\Domain\Repository\CategoryRepository;

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
     * @return mixed
     */
    public function render()
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        /** @var CategoryRepository $categoryRepo */
        $categoryRepo = $objectManager->get(CategoryRepository::class);
        $table = $this->arguments['table'];
        $field = $this->arguments['field'];
        $uid = $this->arguments['uid'];

        $categories = $categoryRepo->findByTableAndFieldname(
            $table,
            $field,
            $uid
        );

        return $categories;
    }

    protected function buildRenderChildrenClosure()
    {
        // TODO: Implement buildRenderChildrenClosure() method.
    }
}
