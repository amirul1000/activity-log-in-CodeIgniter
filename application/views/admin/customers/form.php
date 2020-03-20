<a href="<?php echo site_url('admin/customers/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Customers'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/customers/save/'.$customers['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Full Name" class="col-md-4 control-label">Full Name</label>
			<div class="col-md-8">
				<input type="text" name="full_name"
					value="<?php echo ($this->input->post('full_name') ? $this->input->post('full_name') : $customers['full_name']); ?>"
					class="form-control" id="full_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
				<textarea name="address" id="address" class="form-control" rows="4" /><?php echo ($this->input->post('address') ? $this->input->post('address') : $customers['address']); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Postcode" class="col-md-4 control-label">Postcode</label>
			<div class="col-md-8">
				<input type="text" name="postcode"
					value="<?php echo ($this->input->post('postcode') ? $this->input->post('postcode') : $customers['postcode']); ?>"
					class="form-control" id="postcode" />
			</div>
		</div>
		<div class="form-group">
			<label for="Home Telephone" class="col-md-4 control-label">Home
				Telephone</label>
			<div class="col-md-8">
				<input type="text" name="home_telephone"
					value="<?php echo ($this->input->post('home_telephone') ? $this->input->post('home_telephone') : $customers['home_telephone']); ?>"
					class="form-control" id="home_telephone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Mobile Mumber" class="col-md-4 control-label">Mobile
				Mumber</label>
			<div class="col-md-8">
				<input type="text" name="mobile_mumber"
					value="<?php echo ($this->input->post('mobile_mumber') ? $this->input->post('mobile_mumber') : $customers['mobile_mumber']); ?>"
					class="form-control" id="mobile_mumber" />
			</div>
		</div>
		<div class="form-group">
			<label for="Notes" class="col-md-4 control-label">Notes</label>
			<div class="col-md-8">
				<textarea name="notes" id="notes" class="form-control" rows="4" /><?php echo ($this->input->post('notes') ? $this->input->post('notes') : $customers['notes']); ?></textarea>
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($customers['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
</script>
