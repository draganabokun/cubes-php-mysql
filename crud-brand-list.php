<?php
session_start();

require_once __DIR__ . '/models/m_brands.php';

$brands = brandsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-brand-list.php';
require_once __DIR__ . '/views/layout/footer.php';