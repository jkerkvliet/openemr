<?php

/**
 * NewEncounterRenderEvent is used to launch different rendering action points that developers can output their
 * own HTML content during the new encounter sequence.
 *
 * @package openemr
 * @link      http://www.open-emr.org
 * @author    Jason Kerkvliet <jason@mmddata.ca>
 * @copyright Copyright (c) 2024 Jason Kerkvliet <jason@mmddata.ca>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

namespace OpenEMR\Events\Encounter;

class NewEncounterRenderEvent
{
    /**
     * Allows screen output after all the new encounter form has been rendered
     */
    const EVENT_SECTION_RENDER_POST = "new.encounter.render.post";

    private int $pid;

    public function __construct($pid) {
        $this->pid = $pid;
    }

    /**
     * @return int|null
     */
    public function getPid(): ?int
    {
        return $this->pid;
    }

    /**
     * @param int|null $pid
     * @return NewEncounterRenderEvent
     */
    public function setPid(?int $pid): NewEncounterRenderEvent
    {
        $this->pid = $pid;
        return $this;
    }
}
