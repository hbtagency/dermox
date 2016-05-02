<?php
wp_enqueue_style('wp-iv_directories-report-11', wp_iv_directories_URLPATH . 'admin/files/css/report/normalize.css');
wp_enqueue_script('iv_directories-report-12', wp_iv_directories_URLPATH . 'admin/files/js/amcharts.js');
//wp_enqueue_script('iv_directories-report-13', wp_iv_directories_URLPATH . 'admin/files/js/serial.js');

global $wpdb;
			
	$api_currency= get_option('_iv_directories_api_currency' );		
	$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack' ";
	$membership_pack = $wpdb->get_results($sql);
		
	$total_package=count($membership_pack);
	//echo'$total_package.....'.$total_package;
	$package_count= array();
	$package_count_report= array();
	$package_amount= array();
	$package_amount_report= array();
	$total=0;
	$total_user=0;
	if(sizeof($membership_pack)>0){
		$i=0;
		foreach ( $membership_pack as $row )		
		{	
			$role_row=get_post_meta($row->ID,'iv_directories_package_user_role',true);
			$packge_cost=get_post_meta($row->ID,'iv_directories_package_cost',true); 
			//$user_fields = array( 'user_login', 'user_nicename', 'user_email', 'user_url' );				
			$user_query = new WP_User_Query( array( 'role' => $role_row) );			
			
			$user_query->total_users ;
			$package_count[$i]['Package']=$row->post_title;
			$package_count[$i]['value']=$user_query->total_users;
			$package_count_report[$i]=$row->post_title .': '.$user_query->total_users .' Users';
			
			
			$total_user=$total_user + $user_query->total_users ;
							
			$i++;	
			//}
		}	
	}
	
$sql_history="SELECT `post_title`,sum(`post_content`)as amount FROM `wp_posts` WHERE  `post_type`='iv_payment'  and post_status='publish' and post_title <>'Bidding Cost'  and post_title <>'Bidding Deposit' group by `post_title`";
$payment_history = $wpdb->get_results($sql_history);
$ii=0;	$amount=0;
if(sizeof($payment_history)>0){
			
	foreach ( $payment_history as $row2 )		
	{
			$package_amount[$ii]['Package']=$row2->post_title;
			$package_amount[$ii]['value']= $row2->amount;
			$package_amount_report[$ii]= $row2->post_title.': ' . $row2->amount.' '.$api_currency ;
			
			$total=$total+$row2->amount;
	$ii++;
	}
}


//Bidding Cost Bidding Cost Bidding Cost Bidding Cost Bidding Cost


$sql_history="SELECT * FROM `wp_posts` WHERE  `post_type`='iv_payment'  and post_status='publish' and post_title ='Bidding Cost' ";
$payment_history = $wpdb->get_results($sql_history);
$total_bidding_cost=0;
if(sizeof($payment_history)>0){
				
	foreach ( $payment_history as $row2 )		
	{
			
			
			$total_bidding_cost=$total_bidding_cost+ get_post_meta($row2->ID,'amount',true);			
	}
}

//$total=$package_amount[$ii]['value'];
//$ii++;
$package_amount[$ii]['Package']='Bidding Cost: '.$total_bidding_cost.$api_currency;
$package_amount[$ii]['value']=$total_bidding_cost;
$package_amount_report[$ii]= 'Bidding Cost: '.$total_bidding_cost.$api_currency;

$ii++;

//Bidding Deposit  Bidding Deposit  Bidding Deposit  Bidding Deposit  Bidding Deposit  
$total_bidding_deposit=0;
$sql_history="SELECT * FROM `wp_posts` WHERE  `post_type`='iv_payment'  and post_status='publish' and  post_title ='Bidding Deposit'";
$payment_history = $wpdb->get_results($sql_history);
if(sizeof($payment_history)>0){
				
	foreach ( $payment_history as $row2 )		
	{
			
			
			$total_bidding_deposit=$total_bidding_deposit+ get_post_meta($row2->ID,'amount',true);		
			
			
	}
}
$package_amount[$ii]['Package']='Bidding Deposit: '.$total_bidding_deposit.$api_currency;
$package_amount[$ii]['value']=$total_bidding_deposit;
$package_amount_report[$ii]= 'Bidding Deposit: '.$total_bidding_deposit.$api_currency;

$ii++;

	$user_chart= array();
	//$sql="SELECT * FROM $wpdb->users ";
	$sql="select count(*) as total_users ,date(user_registered) as reg_date from $wpdb->users group by reg_date having total_users > 0 ";
	$users_all = $wpdb->get_results($sql);
	
	//echo'$total_package.....'.$total_package;
	$user_chart_string='';
	if(sizeof($users_all)>0){
		$i=0;
		foreach ( $users_all as $row )
		{
		 //$row->user_ount;
		
		$user_chart[$i]['udate']=date('Y-m-d',strtotime($row->reg_date));
		$user_chart[$i]['value']= $row->total_users;			
		$i++;
		}
	}
	
	$package_count_json= json_encode($package_count);
	$package_amount_json= json_encode($package_amount);
	$user_chart_string= json_encode($user_chart);
	
				
?>
<style>
		
</style>
<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		<div class="pull-left">
			<a href="http://www.amcharts.com/javascript-charts/" style="text-decoration:none" >js chart by amCharts </a>
		</div>
		<div class="row ">
		 <div class="col-md-12">				
			<table width="100%">

					<tr>
						<td width="50%"> <div class="panel panel-info">
													<div  id="package_user" style="width:100%; height:400px;">						
												</div> 
											
												
												<div class="panel-body">
													
													<?php
													$i=1;
													foreach($package_count_report as $pac){
														echo '<br/>'.$i.'. '.$pac;
													 $i++;
													}
													?>
													<br/>
													<strong>Total : <?php echo $total_user.' Users'; ?>  </strong>
											  </div>
										</div> 
						
						
						</td>
						<td width="50%">
							
							<div class="panel panel-info">
													<div  id="package_amount" style="width:100%; height:400px;">						
												</div> 
											
												
												<div class="panel-body">
													<?php
													$iii=1;
													foreach($package_amount_report as $pac){
														echo '<br/>'.$iii.'. '.$pac;
													 $iii++;
													}
													?>
													<br/>
													
											  </div>
							</div> 
							
							
						</td>
					</tr>
					
				</table>
			</div>	
			
		</div>
		
		
		<div class="panel panel-info">
				<div class="panel-body">
					<h3  class="page-header">User Registration Chart<small></small></h3>
					
					<div class="col-md-12">		
						<div id="chart-line" style="width:100%; height:400px;"></div>
					</div>
				</div>
		</div>
		
		<div class="pull-right">
			<a href="http://www.amcharts.com/javascript-charts/" style="text-decoration:none" >js chart by amCharts </a>
		</div>	
	</div>
</div>
 <style>


a:link {color: #84c4e2;}
a:visited {color:#84c4e2;}
a:hover {color: #cd82ad;}
a:active {color: #84c4e2;}
 </style>
    <script type="text/javascript">
            var chart;
            var graph;
			var chartData =<?php echo	$user_chart_string; ?> ;
				
           jQuery(document).ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.pathToImages = "<?php echo wp_iv_directories_URLPATH;?>admin/files/images/";
                chart.dataProvider = chartData;
                chart.marginLeft = 10;
                chart.categoryField = "udate";
                //chart.dataDateFormat = "M-d-Y";
                 chart.dataDateFormat = "YYYY-MM-DD";


                // listen for "dataUpdated" event (fired when chart is inited) and call zoomChart method when it happens
                chart.addListener("dataUpdated", zoomChart);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is yearly, so we set minPeriod to YYYY
                categoryAxis.dashLength = 3;
                categoryAxis.minorGridEnabled = true;
                categoryAxis.minorGridAlpha = 0.1;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.inside = true;
                valueAxis.dashLength = 3;
                chart.addValueAxis(valueAxis);

                // GRAPH
                graph = new AmCharts.AmGraph();
                graph.type = "smoothedLine"; // this line makes the graph smoothed line.
                graph.lineColor = "#d1655d";
                graph.negativeLineColor = "#637bb6"; // this line makes the graph to change color when it drops below 0
                graph.bullet = "round";
                graph.bulletSize = 8;
                graph.bulletBorderColor = "#FFFFFF";
                graph.bulletBorderAlpha = 1;
                graph.bulletBorderThickness = 2;
                graph.lineThickness = 2;
                graph.valueField = "value";
                //graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat =  "DD";
                chart.addChartCursor(chartCursor);

                // SCROLLBAR
                var chartScrollbar = new AmCharts.ChartScrollbar();
                chart.addChartScrollbar(chartScrollbar);

                chart.creditsPosition = "bottom-right";

                // WRITE
                chart.write("chart-line");
            });

            // this method is called when chart is first inited as we listen for "dataUpdated" event
            function zoomChart() {
                // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
               // chart.zoomToDates(new Date(1972, 0), new Date(1984, 0));
            }
        </script>

<script>
var chart="";
var legend='';

var chartDataCount = <?php print_r( $package_count_json); ?>;

//AmCharts.ready(function() {
jQuery(document).ready(function () {
    // PIE CHART
	
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartDataCount;
	chart.addTitle("Package's Users ", 16);
    chart.titleField = "Package";
    chart.valueField = "value";
	chart.sequencedAnimation = true;	
    //chart.startEffect = "elastic";
    chart.outlineColor = "";
    chart.colors	=["#87D37C", "#F89406", "#22A7F0",  "#F9BF3B", "#B0DE09",  "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#754DEB", "#DDDDDD", "#999999", "#333333", "#000000", "#57032A", "#CA9726", "#990000", "#4B0C25"];
    
   
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 2;
	chart.labelRadius = 15;
    // this makes the chart 3D
    chart.depth3D = 20;
    chart.angle = 30;

    // WRITE
    chart.write("package_user");
});
</script>	
<script>
var chart="";
var legend='';

var chartDataAmount =<?php print_r( $package_amount_json); ?>;

//AmCharts.ready(function() {
jQuery(document).ready(function () {
    // PIE CHART
    chart = new AmCharts.AmPieChart();
	chart.addTitle("Earn By Packages ", 16);
    chart.dataProvider = chartDataAmount;
    chart.titleField = "Package";
    chart.valueField = "value";
    chart.colors	=["#87D37C", "#F89406", "#22A7F0",  "#B0DE09",  "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#754DEB", "#DDDDDD", "#999999", "#333333", "#000000", "#57032A", "#CA9726", "#990000", "#4B0C25","#F9BF3B" ];
	chart.sequencedAnimation = true;
	//chart.startEffect = "elastic";
    chart.outlineColor = "";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 2;
	chart.labelRadius = 15;
	//chart.innerRadius = "30%";
    // this makes the chart 3D
    chart.depth3D = 20;
    chart.angle = 30;

    // WRITE
    chart.write("package_amount");
});
</script>	
      
