<?php
include_once('app/init.php');
include_once('views/_header.php');

$post_id = '';
if (isset($_GET['post-id']) && !empty($_GET['post-id'])) {
	$post_id = $_GET['post-id'];
} else {
	header('Location: index.php');
}

$post = get_by_id($post_id);

?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('public/img/post-bg.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					<h1><?= $post['title'] ?></h1>
					<h2 class="subheading"><?= $post['sub_title'] ?></h2>
					<span class="meta">Posted by
					<a href="#"><?= $post['fullname'] ?></a>
					on August 24, 2017</span>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Post Content -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<?= $post['body'] ?>
			</div>
		</div>
	</div>
</article>
<hr>

<?php
include_once('views/_footer.php');
?>