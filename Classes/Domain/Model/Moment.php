<?php

declare(strict_types=1);

namespace Pluswerk\Timeline\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Moment extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var int
     */
    protected $exactDay = 0;

    /**
     * @var int
     *
     * This variable gets calculated and is not filled from the database
     */
    protected $dayOfEpoch = 0;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getExactDay(): int
    {
        return $this->exactDay;
    }

    /**
     * @return int
     */
    public function getDayOfEpoch(): int
    {
        return $this->dayOfEpoch;
    }

    /**
     * @param int $dayOfEpoch
     * @return void
     */
    public function setDayOfEpoch(int $dayOfEpoch): void
    {
        $this->dayOfEpoch = $dayOfEpoch;
    }
}
