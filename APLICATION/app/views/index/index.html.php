<h1>Users in base:</h1>
<ul>
<?php
if ($users) {
	foreach ($users as $user) {
		echo '<li>' . $user['name'] . '</li>';
	}
}?>
</ul>