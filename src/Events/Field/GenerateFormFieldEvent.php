<?php

/**
 * GenerateFormFieldEvent class. This class enables 3rd party developers to add or append to form field types,
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

class GenerateFormFieldEvent extends Event
{
     /**
     * This event is triggered when a form field is being generated for editing.
     *
     */
    const EVENT_HANDLE = 'field.generate';

    /** @var array The layout form row data, and current value */
    private $layoutOptionRow;
    private $value;

    public function __construct($layoutOptionRow, $value)
    {
        $this->layoutOptionRow = $layoutOptionRow;
        $this->value = $value;
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
