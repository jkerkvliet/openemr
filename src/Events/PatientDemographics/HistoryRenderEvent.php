<?php

/*
 *
 * @package   OpenEMR
 * @link      https://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2024 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 *
 */

namespace OpenEMR\Events\PatientDemographics;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event object for know what type of appointment has been set on the calendar
 *
 * @package OpenEMR\Events
 * @subpackage Appointments
 *
 */
class HistoryRenderEvent extends Event
{
    /**
     * This event is triggered in above where patient is shown when rendering history
     */
    const RENDER_ABOVE_HISTORY = 'patient.demographics.render.above.history';

    /**
     * @var integer
     */
    private $pid = null;

    /**
     * @param integer $pid
     */
    public function __construct($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return int|null
     *
     * Get the patient identifier of the patient we're attempting to view
     */
    public function getPid()
    {
        return $this->pid;
    }
}
