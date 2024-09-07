<?php

/**
 * RenderDemographicsEditEvent class. This class enables 3rd party developers to append code when the edit demographics page is rendered
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2024 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Events\PatientDemographics;

use Symfony\Contracts\EventDispatcher\Event;

class RenderDemographicsEditEvent extends Event
{
     /**
     * This event is triggered when a field is being displayed
     *
     */
    const BEFORE_RENDER = 'patient_demographics.edit.render.before_render';

    /** @var array The HTML for the field, layout form row data, and current value */
    private $pid;

    public function __construct($pid)
    {
        $this->pid = $pid;
    }

    public function getPid()
    {
        return $this->pid;
    }
}
