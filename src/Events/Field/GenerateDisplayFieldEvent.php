<?php

/**
 * GenerateDisplayFieldEvent class. This class enables 3rd party developers to modify the display format of fields
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

class GenerateDisplayFieldEvent extends Event
{
     /**
     * This event is triggered when a field is being displayed
     *
     */
    const EVENT_HANDLE = 'field.display';

    /** @var array The HTML for the field, layout form row data, and current value */
    private $html;
    private $layoutOptionRow;
    private $value;

    public function __construct($layoutOptionRow, $value, $html)
    {
        $this->layoutOptionRow = $layoutOptionRow;
        $this->value = $value;
        $this->html = $html;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function setHtml(string $html)
    {
        $this->html = $html;
    }

    public function getLayoutOptionRow()
    {
        return $this->layoutOptionRow;
    }

    public function getValue()
    {
        return $this->value;
    }
}
