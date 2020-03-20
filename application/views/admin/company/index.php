<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Company'); ?></h5>
<!--Action-->
<div class="row">
	<div class="col-2"  style="float:left;">
		<a href="<?php echo site_url('admin/company/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="col-2" style="float:left;">
		<i class="mdi mdi-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/company/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>HTML</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="col-8" style="float:right;">
                <?php echo form_open_multipart('admin/company/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of company-->
<div class="card">
                  <div class="card-body">
<table class="table table-striped table-bordered">
	<tr>
		<th>Company Name</th>
		<th>Address</th>
		<!--<th>Country</th>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
		<th>File Company Logo</th>
		<th>File Report Logo</th>
		<th>File Report Background</th>-->
		<th>Report Footer</th>

		<th>Actions</th>
	</tr>
	<?php foreach($company as $c){ ?>
    <tr>
		<td><?php echo $c['company_name']; ?></td>
		<td><?php echo $c['address']; ?></td>
		<!--<td><?php echo $c['country']; ?></td>
		<td><?php echo $c['city']; ?></td>
		<td><?php echo $c['state']; ?></td>
		<td><?php echo $c['zip']; ?></td>
		<td><?php
    if (is_file(APPPATH . '../public/' . $c['file_company_logo']) && file_exists(APPPATH . '../public/' . $c['file_company_logo'])) {
        ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_company_logo']?>"
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
		<td><?php
    if (is_file(APPPATH . '../public/' . $c['file_report_logo']) && file_exists(APPPATH . '../public/' . $c['file_report_logo'])) {
        ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_report_logo']?>"
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
		<td><?php
    if (is_file(APPPATH . '../public/' . $c['file_report_background']) && file_exists(APPPATH . '../public/' . $c['file_report_background'])) {
        ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_report_background']?>"
			class="picture_50x50">
										  <?php
    } else {
        ?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg"
			class="picture_50x50">
										<?php
    }
    ?>	
										</td>-->
		<td><?php echo $c['report_footer']; ?></td>

		<td><a
			href="<?php echo site_url('admin/company/details/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-eye"></i></a> <a
			href="<?php echo site_url('admin/company/save/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-table-edit"></i></a> <a
			href="<?php echo site_url('admin/company/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="mdi mdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>
<!--End of Data display of company//-->

<!--No data-->
<?php
if (count($company) == 0) {
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
