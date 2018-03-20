<?php
$name = $request->get('name', 'world');
$response->setContent(sprintf('hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));;