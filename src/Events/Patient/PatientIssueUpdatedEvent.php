<?php

/**
 * PatientIssueUpdatedEvent
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2025 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Events\Patient;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event object for when a patient issue has been updated
 *
 * @package OpenEMR\Events
 * @subpackage Patient
 */
class PatientIssueUpdatedEvent extends Event
{
    /**
     * This event is triggered after a patient issue has been updated
     */
    const EVENT_HANDLE = 'patient.issue.updated';

    /**
     * @var int Issue ID
     */
    private $issueId;

    /**
     * @var int Patient ID
     */
    private $patientId;

    /**
     * @var string Issue type
     */
    private $issueType;

    /**
     * @var array Old issue data
     */
    private $oldData;

    /**
     * @var array New issue data
     */
    private $newData;

    public function __construct(
        $issueId,
        $patientId,
        $issueType,
        $oldData,
        $newData
    ) {
        $this->issueId = $issueId;
        $this->patientId = $patientId;
        $this->issueType = $issueType;
        $this->oldData = $oldData;
        $this->newData = $newData;
    }

    /**
     * @return int
     */
    public function getIssueId()
    {
        return $this->issueId;
    }

    /**
     * @return int
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * @return string
     */
    public function getIssueType()
    {
        return $this->issueType;
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
