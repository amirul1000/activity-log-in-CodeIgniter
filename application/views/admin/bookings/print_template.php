<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Bookings'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide"> </htmlpageheader>

<htmlpageheader name="otherpages" class="hide"> <span class="float_left"></span>
<span class="padding_5"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
<span class="float_right"></span> </htmlpageheader>
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" />

<htmlpagefooter name="myfooter" class="hide">
<div align="center">
	<br>
	<span class="padding_10">Page {PAGENO} of {nbpg}</span>
</div>
</htmlpagefooter>

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of bookings-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Booking Date</th>
		<th>Booking Time</th>
		<th>Customers</th>
		<th>Number Of Passengers</th>
		<th>Pickup Address</th>
		<th>Drop Off Address</th>
		<th>Return Journey</th>
		<th>Return Date</th>
		<th>Return Time</th>
		<th>Return Flight Number</th>
		<th>Contact Telephone Number</th>
		<th>Total Fare</th>
		<th>Paid Or Unp</th>
		<th>Payment Method</th>
		<th>Comments For Booking</th>
		<th>Type Of Taxi</th>
		<th>Type Of Vehicle Required</th>
		<th>Assign To Driver Users</th>
		<th>Allocated Pickup Time</th>
		<th>Allocated Finish Time Of Booking For The Day</th>
		<th>Customer Type</th>
		<th>Source Of Booking</th>

	</tr>
	<?php foreach($bookings as $c){ ?>
    <tr>
		<td><?php echo $c['booking_date']; ?></td>
		<td><?php echo $c['booking_time']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Customers_model');
    $dataArr = $this->CI->Customers_model->get_customers($c['customers_id']);
    echo $dataArr['full_name'];
    ?>
									</td>
		<td><?php echo $c['number_of_passengers']; ?></td>
		<td><?php echo $c['pickup_address']; ?></td>
		<td><?php echo $c['drop_off_address']; ?></td>
		<td><?php echo $c['return_journey']; ?></td>
		<td><?php echo $c['return_date']; ?></td>
		<td><?php echo $c['return_time']; ?></td>
		<td><?php echo $c['return_flight_number']; ?></td>
		<td><?php echo $c['contact_telephone_number']; ?></td>
		<td><?php echo $c['total_fare']; ?></td>
		<td><?php echo $c['paid_or_unpaid']; ?></td>
		<td><?php echo $c['payment_method']; ?></td>
		<td><?php echo $c['comments_for_booking']; ?></td>
		<td><?php echo $c['type_of_taxi']; ?></td>
		<td><?php echo $c['type_of_vehicle_required']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['assign_to_driver_users_id']);
    echo $dataArr['email'];
    ?>
									</td>
		<td><?php echo $c['allocated_pickup_time']; ?></td>
		<td><?php echo $c['allocated_finish_time_of_booking_for_the_day']; ?></td>
		<td><?php echo $c['customer_type']; ?></td>
		<td><?php echo $c['source_of_booking']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of bookings//-->
