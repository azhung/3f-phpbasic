<?php
include_once('app/init.php');
include_once('views/_header.php');


if (isset($_GET['act']) && $_GET['act'] == 'edit') {

	// Thuc hien edit o day
	if (!empty($_GET['post-id']) || $_GET['post-id'] != null) {
		$id = $_GET['post-id'];

		$post = getById($id);

	} else {
		header('Location: posts.php');
	}

	if (isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['sub_title']) && !empty($_POST['body'])) {

		$title = trim($_POST['title']);
		$subTitle = trim($_POST['sub_title']);
		$body = trim($_POST['body']);
		$status = trim($_POST['postStatus']);

		if (editPost($_GET['post-id'], $title, $subTitle, $body, $status)) {
			$check_update = true;
		} else {
			$check_update = false;
		}
	}

	include_once('views/_post_edit.php');

} elseif (isset($_GET['act']) && $_GET['act'] == 'del') {

	// Thuc hien xoa o day
	$id = $_GET['post-id'];
	if (deletePost($id)) {
		header('Location: posts.php');
	}

} elseif (isset($_GET['act']) && $_GET['act'] == 'add') {

	// Them moi o day

} else {

	// Show post index
	$posts = getAll();
	include_once('views/_posts_index.php');

}

?>
<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Are you sure!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Select Delete if you really want!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<?= '<a class="btn btn-primary" id="deleteAccept" href="">Delete</a>' ?>
			</div>
		</div>
	</div>
</div>
<?php

include_once('views/_footer.php');
