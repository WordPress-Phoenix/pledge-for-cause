<?php 
$args = array(
	'post_type' => 'campaigns',
	'meta_key' => 'is_active',
	'meta_value' => "1",
);

$myCampaigns = new WP_Query( $args );
if( !$myCampaigns->have_posts() ) {
	return;
} else {
	$campaign = $myCampaigns->posts[0];
	$campaign_id = $campaign->ID;
	$campaign_options = maybe_unserialize(get_post_meta($campaign_id, 'campaign_options', true));
	$goal = $campaign_options['goal'];
	$end_date = $campaign_options['end-date'];
    $start_date = $campaign_options['start-date'];
    $fully_booked = $campaign_options['is_fully_booked'];
}

if ($fully_booked == 1) {
	$full = 'Yes, Its Full';
} else {
	$full = 'No, There Are Still Spots!';
}

/**
 * set all variables default
 */
$total = 0;
$total_perc_funded = 0;
$days_remaining = 0;
$date = strtotime($end_date);



/**
 * grab all pledges that match the current campaign's ID
 */
$arguments = array(
	'numberposts' => -1,  // a -1 gets all the posts
	'post_type'   => 'pledges',
    'meta_key' => 'annual-donation-campaign-id',
    'meta_value' => $campaign_id,
);
$pledges = get_posts( $arguments );

foreach( $pledges as $donation ) {
    $post_meta = get_post_meta($donation->ID,'annual_donation_pledge_amount', true );
    $total = $total + $post_meta;
}

$s_date = strtotime($start_date);
if($s_date > time()) {
    $now = time();
    $remaining = $s_date - $now;
    $days_remaining = floor($remaining/ 86400) . " days to start";
} else{
    $now = time();
    $remaining = $date - $now;
    $days_remaining = floor($remaining / 86400) . " days left";
}
?>

<div id="tertiary" class="sidebar-container" role="complementary">
	<div class="blog-widget-area">
			<aside id="text-2" class="blog-widget widget_text widget_text">
				<h2 class="widgettitle">Campaign Snapshot!</h2>
				<div class="textwidget">
					<ul>
						<li><strong>Days Left: </strong> <?php echo $days_remaining; ?></li>
						<li><strong>Total Pledged: </strong> <?php echo '$'.$total; ?></li>
						<li><strong>Number Of Donators: </strong> <?php echo count($pledges); ?></li>
						<li><strong>Is It Fully Booked?: </strong> <?php echo $full; ?></li>
					</ul>
				</div>
			</aside>
	</div>
</div>