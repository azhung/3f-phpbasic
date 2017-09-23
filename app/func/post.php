<?php

/**
 * Get all post data from database
 */
function get_all_posts() {

	global $conn;
	$posts = array();

	$sql = "SELECT posts.id, posts.title, posts.sub_title, posts.body, posts.post_cover, posts.created_at, users.fullname FROM posts INNER JOIN users ON posts.auth_id = users.id WHERE posts.status = 1";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    
	    while($row = mysqli_fetch_assoc($result)) {
	        $posts[] = $row;
	    }
	} 

	return $posts;

}


/**
 * Get post by ID
 */
function get_by_id($id) {

	global $conn;
	$post = array();

	$sql = "SELECT posts.id, posts.title, posts.sub_title, posts.body, posts.post_cover, posts.created_at, users.fullname FROM posts INNER JOIN users ON posts.auth_id = users.id WHERE posts.status = 1 AND posts.id={$id}";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    
	    while($row = mysqli_fetch_assoc($result)) {
	        $post = $row;
	    }
	} 

	return $post;


}