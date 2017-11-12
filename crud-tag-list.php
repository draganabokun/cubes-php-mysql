<?php
session_start();

require_once __DIR__ . '/models/m_tags.php';

$tags = tagsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-tag-list.php';
require_once __DIR__ . '/views/layout/footer.php';

