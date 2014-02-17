<!DOCTYPE html>
<html>

	<head>

		<?php
			print_r($result);
			echo "<table>";
			foreach ($result as $row) {
				echo "<tr>\n";
				echo "\t<td>$row->accession_number</td>\n";
				echo "\t<td>$row->title</td>\n";
				echo "</tr>\n";
			}
			echo "</table>";
		?>

	</head>

</html>