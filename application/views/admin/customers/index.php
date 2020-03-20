<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Customers'); ?></h5>
<!--Action-->
<div class="row">
	<div class="col-2"  style="float:left;">
		<a href="<?php echo site_url('admin/customers/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="col-2" style="float:left;">
		<i class="mdi mdi-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/customers/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>HTML</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="col-8" style="float:right;">
                <?php echo form_open_multipart('admin/customers/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of customers-->
<div class="card">
                  <div class="card-body">
<table class="table table-striped table-bordered">
	<tr>
		<th>Full Name</th>
		<th>Address</th>
		<th>Postcode</th>
		<th>Home Telephone</th>
		<th>Mobile Mumber</th>
		<th>Notes</th>

		<th>Actions</th>
	</tr>
	<?php foreach($customers as $c){ ?>
    <tr>
		<td><?php echo $c['full_name']; ?></td>
		<td><?php echo $c['address']; ?></td>
		<td><?php echo $c['postcode']; ?></td>
		<td><?php echo $c['home_telephone']; ?></td>
		<td><?php echo $c['mobile_mumber']; ?></td>
		<td><?php echo $c['notes']; ?></td>

		<td><a
			href="<?php echo site_url('admin/customers/details/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-eye"></i></a> <a
			href="<?php echo site_url('admin/customers/save/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-table-edit"></i></a> <a
			href="<?php echo site_url('admin/customers/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="mdi mdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>
<!--End of Data display of customers//-->

<!--No data-->
<?php
if (count($customers) == 0) {
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
