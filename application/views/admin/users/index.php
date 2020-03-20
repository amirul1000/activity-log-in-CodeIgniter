<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Staff'); ?></h5>
<!--Action-->
<div class="row">
	<div class="col-2"  style="float:left;">
		<a href="<?php echo site_url('admin/users/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="col-2" style="float:left;">
		<i class="mdi mdi-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/users/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>HTML</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="col-8" style="float:right;">
                <?php echo form_open_multipart('admin/users/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of users-->
<div class="card">
                  <div class="card-body">
<table class="table table-striped table-bordered">
	<tr>
		<th>Email</th>
		<th>Title</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>File Picture</th>
		<th>Phone No</th>
		<!--<th>Dob</th>
		<th>Company</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
		<th>Country</th>-->
		<th>User Type</th>
		<th>Status</th>

		<th>Actions</th>
	</tr>
	<?php foreach($users as $c){ ?>
    <tr>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['title']; ?></td>
		<td><?php echo $c['first_name']; ?></td>
		<td><?php echo $c['last_name']; ?></td>
		<td><?php
    if (is_file(APPPATH . '../public/' . $c['file_picture']) && file_exists(APPPATH . '../public/' . $c['file_picture'])) {
        ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_picture']?>"
			class="picture_50x50">
										  <?php
    } else {
        ?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg"
			class="picture_50x50">
										<?php
    }
    ?>	
										</td>
		<td><?php echo $c['phone_no']; ?></td>
		<!--<td><?php echo $c['dob']; ?></td>
		<td><?php echo $c['company']; ?></td>
		<td><?php echo $c['address']; ?></td>
		<td><?php echo $c['city']; ?></td>
		<td><?php echo $c['state']; ?></td>
		<td><?php echo $c['zip']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Country_model');
    $dataArr = $this->CI->Country_model->get_country($c['country_id']);
    echo $dataArr['country'];
    ?>
									</td>-->
		<td><?php echo $c['user_type']; ?></td>
		<td><?php echo $c['status']; ?></td>

		<td><a href="<?php echo site_url('admin/users/details/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-eye"></i></a> <a
			href="<?php echo site_url('admin/users/save/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-table-edit"></i></a> <a
			href="<?php echo site_url('admin/users/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="mdi mdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>
<!--End of Data display of users//-->

<!--No data-->
<?php
if (count($users) == 0) {
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
