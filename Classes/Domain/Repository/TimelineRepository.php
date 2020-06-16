<?php

declare(strict_types=1);

namespace Pluswerk\Timeline\Domain\Repository;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class TimelineRepository extends Repository
{
    public const TABLE_NAME = 'tx_timeline_domain_model_timeline';

    public function initializeObject(): void
    {
        $querySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function findByUids(array $uids): QueryResultInterface
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(static::TABLE_NAME);
        $queryBuilder->select('*')
            ->from(static::TABLE_NAME)
            ->where(
                $queryBuilder->expr()->in('uid', $uids)
            );

        return $this->doctrineExecute($queryBuilder);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @return QueryResultInterface
     */
    protected function doctrineExecute(QueryBuilder $queryBuilder): QueryResultInterface
    {
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\Query $query */
        $query = $this->createQuery();
        $query->statement($queryBuilder);
        return $query->execute();
    }
}
