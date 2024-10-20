<?php

/*
 *
 * @package   OpenEMR
 * @link      https://www.open-emr.org
 * @author    Sherwin Gaddis <sherwingaddis@gmail.com>
 * @copyright Copyright (c) 2021 Sherwin Gaddis <sherwingaddis@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 *
 */

namespace OpenEMR\Events\Appointments;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event object for know what type of appointment has been set on the calendar
 *
 * @package OpenEMR\Events
 * @subpackage Appointments
 *
 */
class CalendarRenderEvent extends Event
{
    /**
     * This event is triggered in below where patient is shown when rendering appointment
     */
    const RENDER_BELOW_CALENDAR = 'appointment.render.below.calendar';

    /**
     * @var
     */

    public function __construct()
    {

    }
}
