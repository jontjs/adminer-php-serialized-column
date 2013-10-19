<?php

/** Display PHP serialized opject values in edit
* @link http://www.adminer.org/plugins/#use
* @author Denys Temchenko
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/
class AdminerPHPSerializedColumn {

	function head() {
		?>
		<script type="text/javascript">
			function show_phpobject(id) {
				document.getElementById(id + '-closed').style.display = 'none';
				document.getElementById(id + '-opened').style.display = 'block';
			}
			function hide_phpobject(id) {
				document.getElementById(id + '-closed').style.display = 'block';
				document.getElementById(id + '-opened').style.display = 'none';
			}
		</script>
		<?php
	}

	
	function editInput($table, $field, $attrs, $value) {
		if ($this->isSerialized($value)) {
			$object_id = 'php-serialized-object-' . $table . '-' . $field['field'];
			echo '<table cellspacing="0"><tr><td>';
			echo '<div id="'. $object_id . '-closed"><input type="button" value="Show PHP oblect" onclick="show_phpobject(\'' . $object_id . '\');"></div>';
			echo '<div id="'. $object_id . '-opened" style="display:none"><input type="button" value="Hide PHP oblect" onclick="hide_phpobject(\'' . $object_id . '\');"><pre>' . print_r(unserialize($value), true) . '</pre></div>';
			echo '</td></tr></table>';
		}
	}

	function isSerialized($str) {
    	return ($str == serialize(false) || @unserialize($str) !== false);
	}


}
