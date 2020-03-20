<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Bookings'); ?></h5>
<!--Action-->
<div class="row">
	<div class="col-2"  style="float:left;">
		<a href="<?php echo site_url('admin/bookings/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="col-2" style="float:left;">
		<i class="mdi mdi-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/bookings/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>HTML</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="col-8" style="float:right;">
                <?php echo form_open_multipart('admin/bookings/search/',array("class"=>"form-horizontal")); ?>
                <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control-static"  style="float:left;">
				<button type="submit"  style="float:left;">
					<i class="mdi mdi-filter"></i>
				</button>
                <?php echo form_close(); ?>
           
	</div>
</div>

<!--End of Action//-->

<!--Data display of bookings-->

<div class="card">
<div class="card-body">
<table class="table table-striped table-bordered">
	<tr>
		<th>Booking Date</th>
		<th>Booking Time</th>
		<th>Customers</th>
		<th>Number Of Passengers</th>
		<th>Pickup Address</th>
		<th>Drop Off Address</th>
		<!--<th>Return Journey</th>
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
		<th>Source Of Booking</th>-->

		<th>Actions</th>
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
		<!--<td><?php echo $c['return_journey']; ?></td>
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
		<td><?php echo $c['source_of_booking']; ?></td>-->

		<td><a
			href="<?php echo site_url('admin/bookings/details/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-eye"></i></a> <a
			href="<?php echo site_url('admin/bookings/save/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-table-edit"></i></a> <a
			href="<?php echo site_url('admin/bookings/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="mdi mdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>
<!--End of Data display of bookings//-->

<!--No data-->
<?php
if (count($bookings) == 0) {
    ?>
<div align="center">
	<h3>Data is not exists</h3>
</div>
<?php
}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
