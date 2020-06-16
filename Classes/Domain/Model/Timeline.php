<?php

declare(strict_types=1);

namespace Pluswerk\Timeline\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Timeline extends AbstractEntity
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
    protected $displayMode = 0;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Pluswerk\Timeline\Domain\Model\Epoch>
     */
    protected $epochs = null;

    public function __construct()
    {
        $this->epochs = new ObjectStorage();
    }

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
    public function getDisplayMode(): int
    {
        return $this->displayMode;
    }

    /**
     * @return ObjectStorage
     */
    public function getEpochs(): ObjectStorage
    {
        return $this->epochs;
    }
}
