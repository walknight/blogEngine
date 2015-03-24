<?php foreach($posts as $post): ?>


<h2><?php echo $post['title']; ?></h2>
<h4><?php echo lang('posted_in'); ?> <?php echo categories_url($post['categories']); ?> <?php echo lang('by');?> <a href="#"><?php echo $post['display_name']; ?></a> on <?php echo strftime('%B <b>%d</b>', strtotime($post['date_posted']));?>.</h4>
<h5>
    <a href="<?php echo site_url('blog/post/' . $post['url']);?>#comments"><i class="icon-comment"></i>&nbsp;<?php echo $post['comment_count'] ?> <?php echo lang('comments');?></a>
	&nbsp;&nbsp;
	<i class="icon-tags"></i>
	&nbsp;
	<a href="#">responsive</a>
	<a href="#">web</a>
	<a href="#">mobile</a>
</h5>
<img class="media-object" src="holder.js/800x250" alt="">
<?php echo $post['excerpt']; ?>

<?php if ($post['content']): ?>
    <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>" class="btn btn-primary pull-right"><?php echo lang('read_more'); ?></a>
<?php endif; ?>

<hr class="soften">

<?php endforeach; ?>

<?php if ($posts_count > $posts_per_page): ?>
	<div class="pagenavigation">
		<div class="pagenav">
			<?php if ($current_page < $pages_count): ?>
				<div class="left"><a href="<?php echo site_url('blog/page/' . $next_page); ?>/"><?php echo lang('older_entries'); ?></a></div>
			<?php endif; ?>

			<?php if ($current_page > 1): ?>
				<?php if ($previous_page == 1): ?>
					<div class="right"><a href="<?php echo site_url(); ?>"><?php echo lang('newer_entries'); ?></a></div>
				<?php else: ?>
					<div class="right"><a href="<?php echo site_url('blog/page/' . $previous_page); ?>/"><?php echo lang('newer_entries'); ?></a></div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="clearer">&nbsp;</div>
		</div>
		<div class="pagenav_bottom"></div>
	</div>
<?php endif; ?>
