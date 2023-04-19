<?php get_header(); ?>
<?php 
    while (have_posts()) : the_post();
    $post_id = get_the_ID(); // Get the current post ID
    $content = get_post_field('post_content', $post_id); // Get the post content

    // Find the first video in the post content
    preg_match('/<video.*?src=[\'"](.*?)[\'"].*?<\/video>/s', $content, $matches);

    if (!empty($matches)) {
        $video_url = $matches[1]; // Get the video URL from the first video found
    }
    endwhile;
?>
<div class="banner-row">
    <video class="bannervideo" autoplay loop muted src="<?php echo $video_url?>"></video>
</div>
<h1 class="banner-title"><?php the_title(); ?></h1>