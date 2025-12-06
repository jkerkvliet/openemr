<?php

/**
 * PatientDocumentUpdatedEvent
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2025 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Events\PatientDocuments;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event object for when a patient document's details have been updated
 *
 * @package OpenEMR\Events
 * @subpackage PatientDocuments
 */
class PatientDocumentUpdatedEvent extends Event
{
    /**
     * This event is triggered when a patient document's metadata is updated
     */
    const EVENT_HANDLE = 'patient.document.updated';

    /**
     * @var int Document ID
     */
    private $documentId;

    /**
     * @var int Patient ID
     */
    private $patientId;

    /**
     * @var array Old document data
     */
    private $oldData;

    /**
     * @var array New document data
     */
    private $newData;

    public function __construct(
        $documentId,
        $patientId,
        $oldData,
        $newData
    ) {
        $this->documentId = $documentId;
        $this->patientId = $patientId;
        $this->oldData = $oldData;
        $this->newData = $newData;
    }

    /**
     * @return int
     */
    public function getDocumentId()
    {
        return $this->documentId;
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

