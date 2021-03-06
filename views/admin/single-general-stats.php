<?php

/*
 * View of General Statistics
 */

function wws_single_include_general( $current, $stats) {
?>
<div class="data_boxes">
	<div class="data_boxes_title"><?php echo _e( 'General Statistics', 'wp-WSAnalytics'); ?> <div class="arrow_btn"></div></div>
	<div class="data_container">
		<div class="grids_auto_size single">
								<div class="grid_title">
									SESSIONS
								</div>
						<div class="grid_data cen">
							<div class="data_value"><?php echo number_format( $stats->totalsForAllResults['ga:sessions'] ); ?></div>
						</div>
						<div class="grid_footer cen">
							Total number of Sessions within the date range. A session is the period time a user is actively engaged with your website, app, etc.
						</div>
				</div>
		<div class="grids_auto_size single">
						<div class="grid_title">
							USERS
						</div>
						<div class="grid_data cen">
							<div class="data_value"><?php echo number_format($stats->totalsForAllResults['ga:users']); ?></div>
						</div>
						<div class="grid_footer cen">
							Users that have had at least one session within the selected date range. Includes both new and returning users.
						</div>
		</div>
		<div class="grids_auto_size single">
						<div class="grid_title"> BOUNCE RATE </div>
						<div class="grid_data cen">
								<div class="data_value">
										<?php if ($stats->totalsForAllResults['ga:entrances'] <= 0) { ?>
												0.00%
										<?php
											} 
											else {
												echo number_format(round(($stats->totalsForAllResults['ga:bounces'] / $stats->totalsForAllResults['ga:entrances']) * 100, 2), 2);
										?>%                     
						<?php } ?>
								</div>
						</div>
								<div class="grid_footer cen">
										Bounce Rate is the percentage of single-page visits (i.e. visits in which the person left your site from the entrance page without interacting with the page).
								</div>
		</div> 
			<div class="grids_auto_size single">
						<div class="grid_title"> AVG TIME ON THIS PAGE </div>
				<div class="grid_data cen">
						<div class="data_value">
								<?php
									if ($stats->totalsForAllResults['ga:sessions'] <= 0) {
								?>
										00:00:00
								<?php
									} 
									else {
								?>
								<?php
										echo $current->ws_pretty_time($stats->totalsForAllResults['ga:avgSessionDuration']);
								?>
								<?php } ?>
						</div>
				</div>
								<div class="grid_footer cen"> <?php echo _e('The amount of time someone spends on this page.' , 'wp-WSAnalytics')?> </div>
		</div>

		<div class="grids_auto_size single">
				<div class="grid_title"> <?php echo _e('PAGE VIEWS', 'wp-WSAnalytics')?> </div>
						<div class="grid_data cen">
								<div class="data_value">

										<?php
										if ($stats->totalsForAllResults['ga:pageviews'] <= 0) {
												echo '0';
										}
										else {
											 echo $current->wws_number_format( $stats->totalsForAllResults['ga:pageviews']);
										}
										?>

								</div>
						</div>
							<div class="grid_footer cen">
							 <?php echo _e('Pageviews is the total number of pages viewed. Repeated views of a single page are counted.', 'wp-WSAnalytics');?>
							</div>
		</div>
		<div class="grids_auto_size single">
				<div class="grid_title">  <?php echo _e( 'NEW/RETURNING VISITORS' , 'wp-WSAnalytics' ); ?> </div>
				<div class="grid_data cen">
						<div class="data_value">
								<?php 
										if (isset($stats->totalsForAllResults))
												{
												if (!empty($stats["rows"])):
												$returning = $stats->totalsForAllResults['ga:sessions'] - $stats->totalsForAllResults['ga:newUsers'];
								?>
								<script type="text/javascript">
											
											google.load("visualization", "1", {packages:["corechart"],'callback': drawChart});

											function drawChart() {
												var data =  google.visualization.arrayToDataTable([
													['Visitors', 'Visitors Records'],
													['New Visitors',<?php echo $stats->totalsForAllResults['ga:newUsers']; ?>],
													['Return Visitors',<?php echo $returning; ?>],
												]);

												var options = {
													is3D: true,
													legend:'none',
													colors: ['#4fca74', '#0E9236']
												};

												var formatter = new google.visualization.NumberFormat({fractionDigits: 0});
												formatter.format(data, 1);

												var chart = new google.visualization.PieChart(document.getElementById('visitorschart'));
												chart.draw(data, options);
											}

								</script>
								<div id="visitorschart" style="height: 122px; border-radius: 50%;overflow: hidden;"></div>
										<span class="visitor-stats-new"><span class="font-sizing"> New  (<?php echo $current->wws_number_format( $stats->totalsForAllResults['ga:newUsers']); ?>)</span> </span>
										<span class="visitor-stats-ret"><span class="font-sizing"> Returning (<?php echo $current->wws_number_format( $returning ); ?>)</span> </span>
										<?php
												endif; 
										}
										?>
						</div>
				</div>
		</div>
		</div>
		
		<div class="data_boxes_footer">
								<span class="blk"> 
										<span class="dot"></span> 
										<span class="line"></span> 
								</span> 
								<span class="information-txt">
									<?php echo _e('Did you know that total time spent on this page is ' , 'wp-WSAnalytics')?>
									<?php
											echo $current->ws_pretty_time($stats->totalsForAllResults['ga:sessionDuration']);
									?>
								</span>
			</div>
		</div>

<?php } ?>