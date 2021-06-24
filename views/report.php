<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

require_once(dirname(__FILE__) . '/../../../config.php');
require_once(dirname(__FILE__) . '/../classes/report.php');

require_admin();

// Page setup.
$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/a11y_check/views/report.php');
$PAGE->set_pagelayout('report');
$PAGE->set_title('A11y Overview');
$PAGE->set_heading('Woof');

// Get the report.
$report = \local_a11y_check\report::generate_report();

echo $OUTPUT->header();

echo "<h1>hello</h1>";

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<td>Filename</td>";
echo "<td>Title</td>";
echo "<td>Language</td>";
echo "<td>Tagged</td>";
echo "<td>Pages</td>";
echo "</tr>";
echo "</thead>";

foreach ($report as $row) {
    echo "<tr>";
    echo "<td>$row->filename</td>";
    echo "<td>$row->hastitle</td>";
    echo "<td>$row->haslanguage</td>";
    echo "<td>$row->istagged</td>";
    echo "<td>$row->pagecount</td>";
    echo "</tr>";
}
echo "</table>";

echo $OUTPUT->footer();