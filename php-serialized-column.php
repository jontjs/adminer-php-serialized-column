<?php

/** Display PHP serialized opject values in edit
* @link http://www.adminer.org/plugins/#use
* @author Denys Temchenko
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/
class AdminerPHPSerializedColumn {

	function head() {
	}

	
	function editInput($table, $field, $attrs, $value) {
		if ($this->isSerialized($value)) {
			$object_id = 'php-serialized-object-' . $table . '-' . $field['field'];
			echo '<table cellspacing="0"><tr><td>';
			echo '<div id="'. $object_id . '-opened"><pre>' . print_r(unserialize($value), true) . '</pre></div>';
			echo '</td></tr></table>';
		}
	}

	function isSerialized($str) {
    	return ($str == serialize(false) || @unserialize($str) !== false);
	}


}
