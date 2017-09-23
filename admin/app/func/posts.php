<?php 

/**
 * Get all data from database
 */
function getAll() {

	global $conn;

	$posts = array();

	$sql = "SELECT posts.id, posts.title, users.fullname, posts.status FROM posts INNER JOIN users ON posts.auth_id = users.id";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    
	    while($row = mysqli_fetch_assoc($result)) {
	        $posts[] = $row;
	    }
	} 

	return $posts;

}

function getById($id) {

	global $conn;
	$post = array();

	$sql = "SELECT * FROM posts WHERE id={$id}";

	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$post = $row;
		}
	}

	return $post;

}

function editPost($id, $title, $subTitle, $body, $status) {

	global $conn;
	$title = mysqli_real_escape_string($conn, $title);
	$subTitle = mysqli_real_escape_string($conn, $subTitle);
	$body = mysqli_real_escape_string($conn, $body);
	$status = mysqli_real_escape_string($conn, $status);


	$sql = "UPDATE posts SET title = '{$title}', sub_title = '{$subTitle}', body = '{$body}', status = {$status} WHERE id = {$id}";
	
	if (mysqli_query($conn, $sql)) {
		return true;
	} else {
		echo mysqli_error($conn);
	}

}


function deletePost($id) {

	global $conn;

	$sql = "UPDATE posts SET status = 2 WHERE id = {$id}";
	if (mysqli_query($conn, $sql)) {
		return true;
	} else {
		echo mysqli_error($conn);
	}

}