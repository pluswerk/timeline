<?php

declare(strict_types=1);

namespace Pluswerk\Timeline\Controller;

use DateTime;
use Pluswerk\Timeline\Domain\Model\Epoch;
use Pluswerk\Timeline\Domain\Model\Moment;
use Pluswerk\Timeline\Domain\Model\Timeline;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class TimelineController extends ActionController
{
    /**
     * @var \Pluswerk\Timeline\Domain\Repository\TimelineRepository
     * @\TYPO3\CMS\Extbase\Annotation\Inject()
     */
    protected $timelineRepository;

    /**
     * @return void
     */
    public function listAction()
    {
        $uids = GeneralUtility::intExplode(',', $this->settings['timeline'] ?? '');
        $timelines = $this->timelineRepository->findByUids($uids);

        $timelineFrontendArray = [];
        /** @var Timeline $timeline */
        foreach ($timelines as $timeline) {
            $timelineFrontendArray[$timeline->getUid()]['timeline'] = $timeline;
            $totalDayCount = 0;

            /** @var Epoch $epoch */
            foreach ($timeline->getEpochs() as $epoch) {
                $epochDayCount = $epoch->getDayCount();
                $totalDayCount += $epochDayCount;

                /** @var Moment $moment */
                foreach ($epoch->getMoments() as $moment) {
                    $firstDate = new DateTime();
                    $firstDate->setTimestamp($epoch->getStartdate());
                    $lastDate = new DateTime();
                    $lastDate->setTimestamp($moment->getExactDay());
                    $moment->setDayOfEpoch((int)$lastDate->diff($firstDate)->format('%a'));
                }
            }

            $timelineFrontendArray[$timeline->getUid()]['totalDayCount'] = $totalDayCount;
        }

        $this->view->assign('timelines', $timelineFrontendArray);
    }
}
