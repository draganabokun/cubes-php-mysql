<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Array of associative arrays that represent rows
 */
function productsFetchAll() {

    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id`";


    return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function productsFetchOneById($id) {

    $link = dbGetLink();

    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`id` = '" . dbEscape($id) . "'";

    return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function productsDeleteOneById($id) {
    $link = dbGetLink();

    $query = "DELETE FROM `products` "
            . "WHERE `id` = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function productsInsertOne(array $data) {
    $link = dbGetLink();

    $data['created_at'] = date('Y-m-d H:i:s');

    $columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";

    $values = array();

    foreach ($data as $value) {
        $values[] = "'" . dbEscape($value) . "'";
    }

    $valuesPart = "(" . implode(', ', $values) . ")";

    $query = "INSERT INTO `products` " . $columnsPart . " VALUES " . $valuesPart;


    dbQuery($query);

    return dbLastInsertId();
}

function productsUpdateOneById($id, $data) {
    $link = dbGetLink();

    $setParts = array();

    foreach ($data as $column => $value) {
        $setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
    }

    $setPart = implode(',', $setParts);

    $query = "UPDATE `products` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function productsGetCount() {
    $link = dbGetLink();

    $query = "SELECT COUNT(`id`) FROM `products`";

    return dbFetchColumn($query);
}

function productsUpdatePhotoFileName($id, $photoFileName) {
    $link = dbGetLink();
    $query = "UPDATE products "
            . "SET photo_filename = '" . dbEscape($photoFileName) . "' "
            . "WHERE id = '" . dbEscape($id) . "'";

    return dbQuery($query);
}

function productsFetchAllByPage($page, $rowsPerPage) {
    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id`";

    $limit = $rowsPerPage;
    $offset = ($page - 1) * $rowsPerPage;

    $query .= " LIMIT " . $limit . " OFFSET " . $offset;

    return dbFetchAll($query);
}

function productsFetchAllByCategory($categoryId) {
    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`category_id` = '" . dbEscape($categoryId) . "' ";

    return dbFetchAll($query);
}

function productsGetCountByCategory($categoryId) {
    $link = dbGetLink();
    $query = "SELECT "
            . "COUNT(`products`.`id`) "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`category_id` = '" . dbEscape($categoryId) . "' ";

    return dbFetchColumn($query);
}

function productsFetchAllByCategoryByPage($categoryId, $page, $rowsPerPage) {
    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`category_id` = '" . dbEscape($categoryId) . "' ";

    $limit = $rowsPerPage;
    $offset = ($page - 1) * $rowsPerPage;

    $query .= " LIMIT " . $limit . " OFFSET " . $offset;

    return dbFetchAll($query);
}

/**
 * @return int Count of all rows in table
 */
function productsOnSaleGetCount() {
    $link = dbGetLink();

    $query = "SELECT COUNT(`id`) "
            . "FROM `products` "
            . "WHERE `on_sale` = 1";

    return dbFetchColumn($query);
}

function productsFetchAllBySaleByPage($page, $rowsPerPage) {
    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`on_sale` = 1";

    $limit = $rowsPerPage;
    $offset = ($page - 1) * $rowsPerPage;

    $query .= " LIMIT " . $limit . " OFFSET " . $offset;

    return dbFetchAll($query);
}

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function productsFetchAllOnSaleLatestFour() {
    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`on_sale` = 1 "
            . "ORDER BY `products`.`created_at` DESC "
            . "LIMIT 4";


    return dbFetchAll($query);
}

/**
 * @return int Count of all rows in table where brand is equal as required brand id
 */
function productsGetCountByBrand($brandId) {
    $link = dbGetLink();

    $query = "SELECT COUNT(`id`) "
            . "FROM `products` "
            . "WHERE `brand_id` = '" . dbEscape($brandId) . "'";

    return dbFetchColumn($query);
}

function productsFetchAllByBrandByPage($brandId, $page, $rowsPerPage) {
    $link = dbGetLink();
    $query = "SELECT "
            . "`products`.*, "
            . "`categories`.`title` AS category_title, "
            . "`brands`.`title` AS brand_title "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `products`.`brand_id` = '" . dbEscape($brandId) . "' ";

    $limit = $rowsPerPage;
    $offset = ($page - 1) * $rowsPerPage;

    $query .= " LIMIT " . $limit . " OFFSET " . $offset;

    return dbFetchAll($query);
}

function productsGetCountByGroup($groupId) {

    $link = dbGetLink();
    
    $query = "SELECT "
            . "COUNT(`products`.`id`) "
            . "FROM `products` "
            . "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
            . "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
            . "WHERE `categories`.`group_id` = '" . dbEscape($groupId) . "' ";

    return dbFetchColumn($query);
}

function productsGetCountByTag($tagId) {

    $link = dbGetLink();
    
    $query = "SELECT "
            . "COUNT(`product_id`) "
            . "FROM `product-tags` "
            . "WHERE `tag_id` = '" . dbEscape($tagId) . "' ";

    return dbFetchColumn($query);
}