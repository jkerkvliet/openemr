<?php

/**
 * PatientIssueCreatedEvent
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
 * Event object for when a new patient issue has been created
 *
 * @package OpenEMR\Events
 * @subpackage Patient
 */
class PatientIssueCreatedEvent extends Event
{
    /**
     * This event is triggered after a new patient issue has been created
     */
    const EVENT_HANDLE = 'patient.issue.created';

    /**
     * @var int Issue ID
     */
    private $issueId;

    /**
     * @var int Patient ID
     */
    private $patientId;

    /**
     * @var string Issue type (medical_problem, allergy, medication, etc.)
     */
    private $issueType;

    /**
     * @var string Issue title
     */
    private $title;

    /**
     * @var string Begin date
     */
    private $beginDate;

    /**
     * @var string Issue diagnosis codes
     */
    private $diagnosis;

    /**
     * @var string Comments
     */
    private $comments;

    public function __construct(
        $issueId,
        $patientId,
        $issueType,
        $title,
        $beginDate = null,
        $diagnosis = null,
        $comments = null
    ) {
        $this->issueId = $issueId;
        $this->patientId = $patientId;
        $this->issueType = $issueType;
        $this->title = $title;
        $this->beginDate = $beginDate;
        $this->diagnosis = $diagnosis;
        $this->comments = $comments;
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @return string|null
     */
    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    /**
     * @return string|null
     */
    public function getComments()
    {
        return $this->comments;
    }
}
