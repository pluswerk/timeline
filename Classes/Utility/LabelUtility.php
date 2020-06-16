<?php

declare(strict_types=1);

namespace Pluswerk\Timeline\Utility;

class LabelUtility
{
    public function epochLabel(&$parameters, $parentObject)
    {
        $startdate = $this->getFormattedDate($parameters['row']['startdate']);
        $enddate = $this->getFormattedDate($parameters['row']['enddate']);
        $title = $parameters['row']['title'];

        $parameters['title'] = sprintf('%s, %s - %s', $title, $startdate, $enddate);
    }

    public function momentLabel(&$parameters, $parentObject)
    {
        $date = $this->getFormattedDate($parameters['row']['exact_day']);
        $title = $parameters['row']['title'];

        $parameters['title'] = sprintf('%s, %s', $title, $date);
    }

    private function getFormattedDate($timestamp): string
    {
        if (is_numeric($timestamp)) {
            $timestamp = (int)$timestamp;
            $dateTime = new \DateTime();
            $dateTime->setTimestamp($timestamp);
            return $dateTime->format('d.m.Y');
        }

        return '';
    }
}
