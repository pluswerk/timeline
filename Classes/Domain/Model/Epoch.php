<?php

declare(strict_types=1);

namespace Pluswerk\Timeline\Domain\Model;

use DateTime;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Epoch extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $alternativeTitle = '';

    /**
     * @var int
     */
    protected $startdate = 0;

    /**
     * @var int
     */
    protected $enddate = 0;

    /**
     * @var string
     */
    protected $color = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Pluswerk\Timeline\Domain\Model\Moment>
     */
    protected $moments = null;

    /**
     * @var int
     *
     * This variable gets calculated dynamically based on the daterange
     * E.g. if you have 3 epochs, you need to know the absolute count of days to split the timeline into different sized segments in the frontend
     */
    protected $dayCount;

    public function __construct()
    {
        $this->moments = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getStartdate(): int
    {
        return $this->startdate;
    }

    /**
     * @return int
     */
    public function getEnddate(): int
    {
        return $this->enddate;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return ObjectStorage
     */
    public function getMoments(): ObjectStorage
    {
        return $this->moments;
    }

    public function getDayCount(): int
    {
        $firstDate = new DateTime();
        $firstDate->setTimestamp($this->getStartdate());
        $lastDate = new DateTime();
        $lastDate->setTimestamp($this->getEnddate());

        return (int)$lastDate->diff($firstDate)->format('%a');
    }

    /**
     * @return string
     */
    public function getAlternativeTitle(): string
    {
        return $this->alternativeTitle;
    }

    /**
     * @param string $alternativeTitle
     * @return void
     */
    public function setAlternativeTitle(string $alternativeTitle): void
    {
        $this->alternativeTitle = $alternativeTitle;
    }
}
