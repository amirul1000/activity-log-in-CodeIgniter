<style>
.ui-timepicker-table td a{
  padding:0px !important;	
}
</style>
<a href="<?php echo site_url('admin/bookings/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Bookings'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/bookings/save/'.$bookings['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Booking Date" class="col-md-4 control-label">Booking Date</label>
			<div class="col-md-8">
				<input type="text" name="booking_date" id="booking_date"
					value="<?php echo ($this->input->post('booking_date') ? $this->input->post('booking_date') : $bookings['booking_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Booking Time" class="col-md-4 control-label">Booking Time</label>
			<div class="col-md-8">
				<input type="text" name="booking_time"
					value="<?php echo ($this->input->post('booking_time') ? $this->input->post('booking_time') : $bookings['booking_time']); ?>"
					class="form-control timepicker" id="booking_time" />

            </div>
		</div>
		<div class="form-group">
			<label for="Customers" class="col-md-4 control-label">Customers</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Customers_model');
        $dataArr = $this->CI->Customers_model->get_all_customers();
        ?> 
          <select name="customers_id" id="customers_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($bookings['customers_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['full_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Number Of Passengers" class="col-md-4 control-label">Number
				Of Passengers</label>
			<div class="col-md-8">
				<input type="text" name="number_of_passengers"
					value="<?php echo ($this->input->post('number_of_passengers') ? $this->input->post('number_of_passengers') : $bookings['number_of_passengers']); ?>"
					class="form-control" id="number_of_passengers" />
			</div>
		</div>
		<div class="form-group">
			<label for="Pickup Address" class="col-md-4 control-label">Pickup
				Address</label>
			<div class="col-md-8">
				<textarea name="pickup_address" id="pickup_address"
					class="form-control" rows="4" /><?php echo ($this->input->post('pickup_address') ? $this->input->post('pickup_address') : $bookings['pickup_address']); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Drop Off Address" class="col-md-4 control-label">Drop Off
				Address</label>
			<div class="col-md-8">
				<textarea name="drop_off_address" id="drop_off_address"
					class="form-control" rows="4" /><?php echo ($this->input->post('drop_off_address') ? $this->input->post('drop_off_address') : $bookings['drop_off_address']); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Return Journey" class="col-md-4 control-label">Return
				Journey</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('bookings', 'return_journey');
        ?> 
           <select name="return_journey" id="return_journey"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($bookings['return_journey']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Return Date" class="col-md-4 control-label">Return Date</label>
			<div class="col-md-8">
				<input type="text" name="return_date" id="return_date"
					value="<?php echo ($this->input->post('return_date') ? $this->input->post('return_date') : $bookings['return_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Return Time" class="col-md-4 control-label">Return Time</label>
			<div class="col-md-8">
				<input type="text" name="return_time"
					value="<?php echo ($this->input->post('return_time') ? $this->input->post('return_time') : $bookings['return_time']); ?>"
					class="form-control" id="return_time" />
			</div>
		</div>
		<div class="form-group">
			<label for="Return Flight Number" class="col-md-4 control-label">Return
				Flight Number</label>
			<div class="col-md-8">
				<input type="text" name="return_flight_number"
					value="<?php echo ($this->input->post('return_flight_number') ? $this->input->post('return_flight_number') : $bookings['return_flight_number']); ?>"
					class="form-control" id="return_flight_number" />
			</div>
		</div>
		<div class="form-group">
			<label for="Contact Telephone Number" class="col-md-4 control-label">Contact
				Telephone Number</label>
			<div class="col-md-8">
				<input type="text" name="contact_telephone_number"
					value="<?php echo ($this->input->post('contact_telephone_number') ? $this->input->post('contact_telephone_number') : $bookings['contact_telephone_number']); ?>"
					class="form-control" id="contact_telephone_number" />
			</div>
		</div>
		<div class="form-group">
			<label for="Total Fare" class="col-md-4 control-label">Total Fare</label>
			<div class="col-md-8">
				<input type="text" name="total_fare"
					value="<?php echo ($this->input->post('total_fare') ? $this->input->post('total_fare') : $bookings['total_fare']); ?>"
					class="form-control" id="total_fare" />
			</div>
		</div>
		<div class="form-group">
			<label for="Paid Or Unp" class="col-md-4 control-label">Paid Or Unp</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('bookings', 'paid_or_unpaid');
        ?> 
           <select name="paid_or_unpaid" id="paid_or_unpaid"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($bookings['paid_or_unpaid']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Payment Method" class="col-md-4 control-label">Payment
				Method</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('bookings', 'payment_method');
        ?> 
           <select name="payment_method" id="payment_method"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($bookings['payment_method']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Comments For Booking" class="col-md-4 control-label">Comments
				For Booking</label>
			<div class="col-md-8">
				<textarea name="comments_for_booking" id="comments_for_booking"
					class="form-control" rows="4" /><?php echo ($this->input->post('comments_for_booking') ? $this->input->post('comments_for_booking') : $bookings['comments_for_booking']); ?></textarea>
			</div>
		</div>
       <?php
	     if ($this->session->userdata('user_type')!="driver") {
	   ?>
		<div class="form-group">
			<label for="Type Of Taxi" class="col-md-4 control-label">Type Of Taxi</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('bookings', 'type_of_taxi');
        ?> 
           <select name="type_of_taxi" id="type_of_taxi"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($bookings['type_of_taxi']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Type Of Vehicle Required" class="col-md-4 control-label">Type
				Of Vehicle Required</label>
			<div class="col-md-8">
				<input type="text" name="type_of_vehicle_required"
					value="<?php echo ($this->input->post('type_of_vehicle_required') ? $this->input->post('type_of_vehicle_required') : $bookings['type_of_vehicle_required']); ?>"
					class="form-control" id="type_of_vehicle_required" />
			</div>
		</div>
		<div class="form-group">
			<label for="Assign To Driver Users" class="col-md-4 control-label">Assign
				To Driver Users</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Users_model');
        $dataArr = $this->CI->Users_model->get_all_drivers();
        ?> 
          <select name="assign_to_driver_users_id"
					id="assign_to_driver_users_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($bookings['assign_to_driver_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?> <?=$dataArr[$i]['last_name']?> <?=$dataArr[$i]['email']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Allocated Pickup Time" class="col-md-4 control-label">Allocated
				Pickup Time</label>
			<div class="col-md-8">
				<input type="text" name="allocated_pickup_time"
					value="<?php echo ($this->input->post('allocated_pickup_time') ? $this->input->post('allocated_pickup_time') : $bookings['allocated_pickup_time']); ?>"
					class="form-control timepicker" id="allocated_pickup_time" />
			</div>
		</div>
		<div class="form-group">
			<label for="Allocated Finish Time Of Booking For The Day"
				class="col-md-4 control-label">Allocated Finish Time Of Booking For
				The Day</label>
			<div class="col-md-8">
				<input type="text"
					name="allocated_finish_time_of_booking_for_the_day"
					value="<?php echo ($this->input->post('allocated_finish_time_of_booking_for_the_day') ? $this->input->post('allocated_finish_time_of_booking_for_the_day') : $bookings['allocated_finish_time_of_booking_for_the_day']); ?>"
					class="form-control"
					id="allocated_finish_time_of_booking_for_the_day" />
			</div>
		</div>
		<div class="form-group">
			<label for="Customer Type" class="col-md-4 control-label">Customer
				Type</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('bookings', 'customer_type');
        ?> 
           <select name="customer_type" id="customer_type"
					class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($bookings['customer_type']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php
            }
            ?> 
           </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Source Of Booking" class="col-md-4 control-label">Source
				Of Booking</label>
			<div class="col-md-8">
				<input type="text" name="source_of_booking"
					value="<?php echo ($this->input->post('source_of_booking') ? $this->input->post('source_of_booking') : $bookings['source_of_booking']); ?>"
					class="form-control" id="source_of_booking" />
			</div>
		</div>
       <?php
		 }
	   ?>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($bookings['id'])){?>Save<?php }else{?>Update<?php } ?></button>
	</div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
	
	// $(document).ready(function() {

     $('#booking_time').timepicker();
	 $('#return_time').timepicker();
	 $('#allocated_pickup_time').timepicker();
			
          //  $('#number_of_passengers').dialog();
   //  });
</script>
