<?php

function getAllArticles($link, $enabled = true, $limit = false) {
    $sql = 'SELECT * FROM articles ';
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
function getOneArticle($link, $id) {
	$id = mysqli_real_escape_string($link, $id);
    $sql = 'SELECT * FROM articles WHERE id = ' . $id;
	$result = mysqli_query($link, $sql);
	if ($result)
		return $result;
	else
		return false;
}
function addArticle($link, array $article) {
    $article['title'] = mysqli_real_escape_string($link, $article['title']);
    $article['content'] = mysqli_real_escape_string($link, $article['content']);
    if (isset($article['enabled'])) {
        $article['enabled'] = mysqli_real_escape_string($link, $article['enabled']);
    } else {
        $article['enabled'] = false;
    }
    $sql = 'INSERT INTO articles (`id`, `title`, `content`, `date`, `enabled`) VALUES (NULL, "'.$article['title'].'", "'.$article['content'].'", NULL, "'.$article['enabled'].'")';
	$result = mysqli_query($link, $sql);
	if ($result)
		return $result;
	else
		return false;
}
function updateArticle($link, $article, $id) {

}
function removeArticle($link, $id) {
    $id = mysqli_real_escape_string($link, $id);
    $sql = 'DELETE FROM articles WHERE id = ' . $id;
    $result = mysqli_query($link, $sql);
    if ($result)
        return $result;
    else
        return false;
}
function activateArticle($link, $id) {
    $id = mysqli_real_escape_string($link, $id);
    $sql = 'SELECT `enabled` FROM articles WHERE id = ' . $id;
    $result = mysqli_query($link, $sql);
    $article = mysqli_fetch_array($result);
    if ($article['enabled'] == '1') {
        $bool = 0;
    } else {
        $bool = 1;
    }
    $sql = 'UPDATE articles SET `enabled`='.$bool.' WHERE `id`='.$id;
    $result = mysqli_query($link, $sql);
    if ($result)
        return $result;
    else
        return false;
}
function customRequest($link, $sql) {
	$result = mysqli_query($link, $sql);
	if($result)
		return $result;
	else
		return false;
}