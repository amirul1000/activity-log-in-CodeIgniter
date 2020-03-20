<a href="<?php echo site_url('admin/bookings/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Bookings'); ?></h5>
<!--Data display of bookings with id-->
<?php
$c = $bookings;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Booking Date</td>
		<td><?php echo $c['booking_date']; ?></td>
	</tr>

	<tr>
		<td>Booking Time</td>
		<td><?php echo $c['booking_time']; ?></td>
	</tr>

	<tr>
		<td>Customers</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Customers_model');
$dataArr = $this->CI->Customers_model->get_customers($c['customers_id']);
echo $dataArr['full_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Number Of Passengers</td>
		<td><?php echo $c['number_of_passengers']; ?></td>
	</tr>

	<tr>
		<td>Pickup Address</td>
		<td><?php echo $c['pickup_address']; ?></td>
	</tr>

	<tr>
		<td>Drop Off Address</td>
		<td><?php echo $c['drop_off_address']; ?></td>
	</tr>

	<tr>
		<td>Return Journey</td>
		<td><?php echo $c['return_journey']; ?></td>
	</tr>

	<tr>
		<td>Return Date</td>
		<td><?php echo $c['return_date']; ?></td>
	</tr>

	<tr>
		<td>Return Time</td>
		<td><?php echo $c['return_time']; ?></td>
	</tr>

	<tr>
		<td>Return Flight Number</td>
		<td><?php echo $c['return_flight_number']; ?></td>
	</tr>

	<tr>
		<td>Contact Telephone Number</td>
		<td><?php echo $c['contact_telephone_number']; ?></td>
	</tr>

	<tr>
		<td>Total Fare</td>
		<td><?php echo $c['total_fare']; ?></td>
	</tr>

	<tr>
		<td>Paid Or Unp</td>
		<td><?php echo $c['paid_or_unpaid']; ?></td>
	</tr>

	<tr>
		<td>Payment Method</td>
		<td><?php echo $c['payment_method']; ?></td>
	</tr>

	<tr>
		<td>Comments For Booking</td>
		<td><?php echo $c['comments_for_booking']; ?></td>
	</tr>

	<tr>
		<td>Type Of Taxi</td>
		<td><?php echo $c['type_of_taxi']; ?></td>
	</tr>

	<tr>
		<td>Type Of Vehicle Required</td>
		<td><?php echo $c['type_of_vehicle_required']; ?></td>
	</tr>

	<tr>
		<td>Assign To Driver Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['assign_to_driver_users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>

	<tr>
		<td>Allocated Pickup Time</td>
		<td><?php echo $c['allocated_pickup_time']; ?></td>
	</tr>

	<tr>
		<td>Allocated Finish Time Of Booking For The Day</td>
		<td><?php echo $c['allocated_finish_time_of_booking_for_the_day']; ?></td>
	</tr>

	<tr>
		<td>Customer Type</td>
		<td><?php echo $c['customer_type']; ?></td>
	</tr>

	<tr>
		<td>Source Of Booking</td>
		<td><?php echo $c['source_of_booking']; ?></td>
	</tr>

	<tr>
		<td>Created At</td>
		<td><?php echo $c['created_at']; ?></td>
	</tr>

	<tr>
		<td>Updated At</td>
		<td><?php echo $c['updated_at']; ?></td>
	</tr>


</table>
<!--End of Data display of bookings with id//-->
