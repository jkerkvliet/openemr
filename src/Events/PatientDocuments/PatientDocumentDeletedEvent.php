<?php

/**
 * PatientDocumentDeletedEvent
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
 * Event object for when a patient document has been deleted
 *
 * @package OpenEMR\Events
 * @subpackage PatientDocuments
 */
class PatientDocumentDeletedEvent extends Event
{
    /**
     * This event is triggered when a patient document is deleted
     */
    const EVENT_HANDLE = 'patient.document.deleted';

    /**
     * @var int Document ID
     */
    private $documentId;

    /**
     * @var int Patient ID
     */
    private $patientId;

    /**
     * @var string Document name
     */
    private $documentName;

    /**
     * @var string Mime type
     */
    private $mimeType;

    /**
     * @var int Category ID
     */
    private $categoryId;

    /**
     * @var string Category name
     */
    private $categoryName;

    public function __construct(
        $documentId,
        $patientId,
        $documentName,
        $mimeType,
        $categoryId,
        $categoryName
    ) {
        $this->documentId = $documentId;
        $this->patientId = $patientId;
        $this->documentName = $documentName;
        $this->mimeType = $mimeType;
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
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
     * @return string
     */
    public function getDocumentName()
    {
        return $this->documentName;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
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
    public function getCategoryName()
    {
        return $this->categoryName;
    }
}
