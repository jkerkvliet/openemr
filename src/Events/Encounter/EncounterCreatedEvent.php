<?php

/**
 * EncounterCreatedEvent
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
 * Event object for when a new encounter has been created
 *
 * @package OpenEMR\Events
 * @subpackage Encounter
 */
class EncounterCreatedEvent extends Event
{
    /**
     * This event is triggered after a new encounter has been created
     */
    const EVENT_HANDLE = 'encounter.created';

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
     * @var int Provider ID
     */
    private $providerId;

    /**
     * @var int Facility ID
     */
    private $facilityId;

    /**
     * @var int Category ID (pc_catid)
     */
    private $categoryId;

    /**
     * @var string Encounter date
     */
    private $encounterDate;

    /**
     * @var string Reason for visit
     */
    private $reason;

    public function __construct(
        $encounterId,
        $encounterNumber,
        $patientId,
        $providerId,
        $facilityId,
        $categoryId,
        $encounterDate,
        $reason = null
    ) {
        $this->encounterId = $encounterId;
        $this->encounterNumber = $encounterNumber;
        $this->patientId = $patientId;
        $this->providerId = $providerId;
        $this->facilityId = $facilityId;
        $this->categoryId = $categoryId;
        $this->encounterDate = $encounterDate;
        $this->reason = $reason;
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
     * @return int
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @return int
     */
    public function getFacilityId()
    {
        return $this->facilityId;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getEncounterDate()
    {
        return $this->encounterDate;
    }

    /**
     * @return string|null
     */
    public function getReason()
    {
        return $this->reason;
    }
}
