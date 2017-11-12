<?php
session_start();

require_once __DIR__ . '/models/m_groups.php';

$groups = groupsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-group-list.php';
require_once __DIR__ . '/views/layout/footer.php';

