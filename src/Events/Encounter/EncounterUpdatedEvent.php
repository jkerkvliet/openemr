<?php

/**
 * EncounterUpdatedEvent
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2025 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Events\Encounter;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event object for when an encounter has been updated
 *
 * @package OpenEMR\Events
 * @subpackage Encounter
 */
class EncounterUpdatedEvent extends Event
{
    /**
     * This event is triggered after an encounter has been updated
     */
    const EVENT_HANDLE = 'encounter.updated';

    /**
     * @var int Encounter ID (form_encounter.id)
     */
    private $encounterId;

    /**
     * @var int Encounter number (form_encounter.encounter)
     */
    private $encounterNumber;

    /**
     * @var int Patient ID
     */
    private $patientId;

    /**
     * @var array Old encounter data
     */
    private $oldData;

    /**
     * @var array New encounter data
     */
    private $newData;

    public function __construct(
        $encounterId,
        $encounterNumber,
        $patientId,
        $oldData,
        $newData
    ) {
        $this->encounterId = $encounterId;
        $this->encounterNumber = $encounterNumber;
        $this->patientId = $patientId;
        $this->oldData = $oldData;
        $this->newData = $newData;
    }

    /**
     * @return int
     */
    public function getEncounterId()
    {
        return $this->encounterId;
    }

    /**
     * @return int
     */
    public function getEncounterNumber()
    {
        return $this->encounterNumber;
    }

    /**
     * @return int
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * @return array
     */
    public function getOldData()
    {
        return $this->oldData;
    }

    /**
     * @return array
     */
    public function getNewData()
    {
        return $this->newData;
    }
}
