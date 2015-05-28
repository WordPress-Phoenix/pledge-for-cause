<?php
//building the email to send
$email = sanitize_email($_POST['email']);
$subject = get_custom_option('email_subject');
$body = get_custom_option('email_body');

//executes the email
if (!wp_mail($email, $subject, $body)) {
	echo '<h2>something went wrong</h2>';
}


get_header(); ?>
<div id="main" class="site-main">

	<header class="page-header arrowed">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header>

	<div class="container">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php get_template_part('parts/content','confirmation.part'); ?>
				<div id="comments" class="comments-area">
				</div>
			</div>
			<?php  get_sidebar('Snapshot'); ?>
		</div>
</div>


</div><!-- #main -->
</div><!-- #page -->
<?php get_footer(); ?>
