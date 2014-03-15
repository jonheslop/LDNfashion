<?php $currentPostType = get_post_type($post); ?>
<nav id="postNav" class="cf">
	<?php if (get_previous_post()) : ?>
	<div class="prev-post wrapper">
		<header class="section_header sidebar_header">
			<h4>&laquo; Previous <?php echo $currentPostType ?></h4>
		</header>
		<?php if ($currentPostType == 'film' || $currentPostType == 'story') {
			previous_post_link('%link', '%title');
		} else {
			previous_post_link('%link', '%title');
		}?>
	</div>
	<?php else : ?>
	<div class="prev-post wrapper">&nbsp;</div>
	<?php endif; ?>
	<?php if (get_next_post()) : ?>
	<div class="next-post wrapper">
		<header class="section_header sidebar_header">
			<h4>Next <?php echo $currentPostType ?> &raquo;</h4>
		</header>
		<?php if ($currentPostType == 'film' || $currentPostType == 'story') {
			next_post_link('%link', '%title');
		} else {
			next_post_link('%link', '%title');
		}?>
	</div>
	<?php endif; ?>
</nav>
