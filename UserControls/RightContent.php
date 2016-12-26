<?php
	$rightWidgets = getWidgets(2);
?>
<div class="rightsidebar">
	<?php if ($rightWidgets) {
        foreach ($rightWidgets as $widget) {
            Template::UserControl($widget["alias"], $widget);
		}
    } ?>
</div>