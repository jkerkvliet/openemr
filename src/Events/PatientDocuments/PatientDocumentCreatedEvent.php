<?php

/**
 * PatientDocumentCreatedEvent
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
 * Event object for when a new document has been created
 *
 * @package OpenEMR\Events
 * @subpackage PatientDocuments
 */
class PatientDocumentCreatedEvent extends Event
{
    /**
     * This event is triggered after a new document has been created
     */
    const EVENT_HANDLE = 'patient.document.created';

    /**
     * @var int Document ID
     */
    private $documentId;

    /**
     * @var int Patient ID
     */
    private $patientId;

    /**
     * @var int Category ID
     */
    private $categoryId;

    /**
     * @var string Document name/filename
     */
    private $documentName;

    /**
     * @var string Document mimetype
     */
    private $mimetype;

    /**
     * @var int Document size in bytes
     */
    private $size;

    /**
     * @var int Foreign reference ID (if applicable)
     */
    private $foreignReferenceId;

    /**
     * @var string Foreign reference table (if applicable)
     */
    private $foreignReferenceTable;

    /**
     * @var int Owner/creator user ID
     */
    private $owner;

    public function __construct(
        $documentId,
        $patientId,
        $categoryId,
        $documentName,
        $mimetype,
        $size,
        $foreignReferenceId = null,
        $foreignReferenceTable = null,
        $owner = null
    ) {
        $this->documentId = $documentId;
        $this->patientId = $patientId;
        $this->categoryId = $categoryId;
        $this->documentName = $documentName;
        $this->mimetype = $mimetype;
        $this->size = $size;
        $this->foreignReferenceId = $foreignReferenceId;
        $this->foreignReferenceTable = $foreignReferenceTable;
        $this->owner = $owner;
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
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getDocumentName()
    {
        return $this->documentName;
    }

    /**
     * @return string
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return int|null
     */
    public function getForeignReferenceId()
    {
        return $this->foreignReferenceId;
    }

    /**
     * @return string|null
     */
    public function getForeignReferenceTable()
    {
        return $this->foreignReferenceTable;
    }

    /**
     * @return int|null
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
