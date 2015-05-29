<?php
$args = array(
    'post_type' => 'campaigns',
    'meta_key' => 'is_active',
    'meta_value' => "1",
);

$myCampaigns = new WP_Query( $args );
if( !$myCampaigns->have_posts() ) {
    if(current_user_can('create_campaigns')) {
        echo '<h2>click <a href="http://local.wordpress.dev/wp-admin/edit.php?post_type=campaigns">here</a> to create a campaign</h2>';
    } else {
        echo '<h2>There is no active campaign letter</h2>';
        return;
    }
}else {
    $campaign = $myCampaigns->posts[0];
    setup_postdata($GLOBALS['post'] =& $campaign);
}

$myCampaigns->the_post();
?>
	<?php 
	$campaign_options = get_post_meta(get_the_ID(), 'campaign_options', true);
	$fully_booked = $campaign_options['is_fully_booked'];
	if( $fully_booked == 1) {
		echo '<h1 style="color:red;">The Campign Is Fully Booked This Year! No More Pledges Will Be Accepted, Sorry! Please Check Back Next Year!</h1>';
	}

	?>
        <h3 class="campaign-widget-title"><?php the_title(); ?></h3>
<!--        <h3> Start Date:-->
<!--            --><?php
//
//            if ( get_post_meta( get_the_ID(), 'campaign_options', true ) ) {
//                $values = maybe_unserialize(get_post_meta(get_the_ID(), 'campaign_options', true));
//                echo $values['start-date'];
//            }
//            ?>
<!---->
<!--        </h3>-->

        <?php the_content();?>
<?php 
// endwhile;
wp_reset_postdata(); //re-sets everything back to normal
?>	