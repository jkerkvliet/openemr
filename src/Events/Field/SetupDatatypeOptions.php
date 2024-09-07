<?php

/**
 * SetupDatatypeOptions class. This class enables 3rd party developers to modify the types of fields in the layout forms editor,
 * including those used in patient demographics.
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2024 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Events\Field;

use Symfony\Contracts\EventDispatcher\Event;

class SetupDatatypeOptions extends Event
{
     /**
     * This event is triggered when a field is being displayed
     *
     */
    const EVENT_HANDLE = 'field.datatype.options';

    /** @var array The list of datatypes, those datatypes using lists, source and UOR options */
    private $datatypes;
    private $typesUsingList;
    private $sources;
    private $UOR;

    public function __construct($datatypes, $typesUsingList, $sources, $UOR)
    {
        $this->datatypes = $datatypes;
        $this->typesUsingList = $typesUsingList;
        $this->sources = $sources;
        $this->UOR = $UOR;
    }

    /**
     * Get the datatypes
     *
     * @return array
     */
    public function getDatatypes()
    {
        return $this->datatypes;
    }

    /**
     * Set the datatypes
     *
     * @param array $datatypes
     */
    public function setDatatypes($datatypes)
    {
        $this->datatypes = $datatypes;
    }

    /**
     * Get the types using list
     *
     * @return array
     */
    public function getTypesUsingList()
    {
        return $this->typesUsingList;
    }

    /**
     * Set the types using list
     *
     * @param array $typesUsingList
     */
    public function setTypesUsingList($typesUsingList)
    {
        $this->typesUsingList = $typesUsingList;
    }

    /**
     * Get the sources
     *
     * @return array
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * Set the sources
     *
     * @param array $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }

    /**
     * Get the UOR
     *
     * @return array
     */
    public function getUOR()
    {
        return $this->UOR;
    }

    /**
     * Set the UOR
     *
     * @param array $UOR
     */
    public function setUOR($UOR)
    {
        $this->UOR = $UOR;
    }
}
