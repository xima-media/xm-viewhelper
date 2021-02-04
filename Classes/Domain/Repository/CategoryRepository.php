<?php
namespace Xima\XmViewhelper\Domain\Repository;

/**
 * Class CategoryRepository
 *
 * @package Xima\XmViewhelper\Domain\Repository
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
{
    /**
     * Get categories of a certain record
     *
     * @param string $table Table of the record to which categories are attached
     * @param string $fieldname Filedname where the categories are stored
     * @param int $uid Uid of the record
     * @return array
     */
    public function findByTableAndFieldname(string $table, string $fieldname, int $uid)
    {
        $where = 'AND sys_category_record_mm.fieldname = '
            . $GLOBALS['TYPO3_DB']->fullQuoteStr($fieldname, 'sys_category_record_mm')
            . ' AND sys_category_record_mm.uid_foreign = ' . (int)$uid;

        $where .= ' AND (sys_category.sys_language_uid = ' . (int)$GLOBALS['TSFE']->sys_language_uid
            . ' OR sys_category.sys_language_uid = -1)';

        $res = $GLOBALS['TYPO3_DB']->exec_SELECT_mm_query(
            'sys_category.*',
            'sys_category',
            'sys_category_record_mm',
            $table,
            $where,
            '',
            'sys_category_record_mm.sorting_foreign'
        );

        $rows = [];
        while ($row = $res->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
}
