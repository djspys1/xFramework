<?php
$name = $request->get('name', 'world');
?>
hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>