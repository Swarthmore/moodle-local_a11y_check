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

/**
 * PDF helper functions local_a11y_check
 *
 * @package   local_a11y_check
 * @copyright 2021 Swarthmore College
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_a11y_check;

defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '/../locallib.php');

/**
 * Report generator functions.
 */
class report {
    public static function generate_report() {
        global $DB;
        $sql = "SELECT actp.checktype, actp.lastchecked, actp.status, actp.statustext,
            ac.contenthash, ac.pathnamehash, ac.hastext, ac.hastitle, ac.haslanguage,
            ac.hasbookmarks, ac.istagged, ac.pagecount
        FROM {local_a11y_check_type_pdf} actp
        INNER JOIN {local_a11y_check} ac ON actp.id=ac.scanid";
        $limit = 1000;
        $files = $DB->get_records_sql($sql, null, 0, $limit);
        return $files;
    }
}
