<?php
namespace Xima\XmViewhelper\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class CategoryRepository
 *
 * @package Xima\XmViewhelper\Domain\Repository
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
{
    const SYS_CATEGORY_TABLE_NAME = 'sys_category';
    const SYS_CATEGORY_MM_TABLE_NAME = 'sys_category_record_mm';

    /**
     * Get categories of a certain record
     *
     * @param string $table Table of the record to which categories are attached
     * @param string $fieldname Field name where the categories are stored
     * @param int $uid Uid of the record
     * @return array
     */
    public function findByTableAndFieldname(string $table, string $fieldname, int $uid)
    {
        /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(self::SYS_CATEGORY_TABLE_NAME);
        $statement = $queryBuilder
            ->select('local.*')
            ->from(self::SYS_CATEGORY_TABLE_NAME, 'local')
            ->join('local', self::SYS_CATEGORY_MM_TABLE_NAME, 'mm', 'mm.uid_local = local.uid')
            ->join('mm', $table, 'foreign', 'foreign.uid = mm.uid_foreign')
            ->where(
                $queryBuilder->expr()->eq('mm.fieldname', $queryBuilder->createNamedParameter($fieldname))
            )
            ->execute();

        return $statement->fetchAll();
    }
}
