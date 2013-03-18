<?php

/**
 * @param $link
 * @param bool $enabled
 * @param bool $limit
 * @return bool|mysqli_result
 */
function getAllArticles($link, $enabled = true, $limit = false) {
    $sql = 'SELECT * FROM article ';
    if ($enabled) {
        $sql .= 'WHERE `enabled`=true';
    }
    $sql .= ' ORDER BY id DESC ';
    if ($limit && is_integer($limit)) {
        $sql .= 'LIMIT '.$limit;
    }
	$result = mysqli_query($link, $sql);
	if($result)
		return $result;
	else
		return false;
}

/**
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
function getOneArticle($link, $id) {
	$id = mysqli_real_escape_string($link, $id);
    $sql = 'SELECT * FROM article WHERE id = ' . $id;
	$result = mysqli_query($link, $sql);
	if ($result)
		return $result;
	else
		return false;
}

/**
 * @param $link
 * @param array $article
 * @return bool|mysqli_result
 */
function addArticle($link, array $article) {
    $title = mysqli_real_escape_string($link, $article['title']);
    $content = mysqli_real_escape_string($link, $article['content']);
    if (isset($article['enabled'])) {
        $enabled = mysqli_real_escape_string($link, $article['enabled']);
    } else {
        $enabled = false;
    }
    $sql = "INSERT INTO article (`id`, `title`, `content`, `date`, `enabled`) VALUES (NULL, '$title', '$content', NULL, '$enabled')";
	$result = mysqli_query($link, $sql);
	if ($result)
		return $result;
	else
		return false;
}

/**
 * @param $link
 * @param array $article
 * @return bool|mysqli_result
 */
function updateArticle($link, array $article) {
    $id = mysqli_real_escape_string($link, $article['id']);
    $title = mysqli_real_escape_string($link, $article['title']);
    $content = mysqli_real_escape_string($link, $article['content']);
    $sql = "UPDATE article SET `title`='$title', `content`='$content' WHERE `id`=$id";
    $result = mysqli_query($link, $sql);
    if ($result)
        return $result;
    else
        return false;
}

/**
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
function removeArticle($link, $id) {
    $id = mysqli_real_escape_string($link, $id);
    $sql = 'DELETE FROM article WHERE id = ' . $id;
    $result = mysqli_query($link, $sql);
    if ($result)
        return $result;
    else
        return false;
}

/**
 * @param $link
 * @param $id
 * @return bool|mysqli_result
 */
function activateArticle($link, $id) {
    $id = mysqli_real_escape_string($link, $id);
    $sql = 'SELECT `enabled` FROM article WHERE id = ' . $id;
    $result = mysqli_query($link, $sql);
    $article = mysqli_fetch_array($result);
    if ($article['enabled'] == '1') {
        $bool = 0;
    } else {
        $bool = 1;
    }
    $sql = 'UPDATE article SET `enabled`='.$bool.' WHERE `id`='.$id;
    $result = mysqli_query($link, $sql);
    if ($result)
        return $result;
    else
        return false;
}

/**
 * @param $link
 * @param $sql
 * @return bool|mysqli_result
 */
function customRequest($link, $sql) {
	$result = mysqli_query($link, $sql);
	if($result)
		return $result;
	else
		return false;
}

/**
 * @param $string
 * @param int $length
 * @return string
 */
function getExcerpt($string, $length = 300) {
    $excerpt = substr($string, 0, $length);
    if (strlen($string) > $length) {
        $excerpt .= '...';
    }
    return $excerpt;
}