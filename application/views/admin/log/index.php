<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Log'); ?></h5>
<!--Action-->
<div class="row">
	<div class="col-2"  style="float:left;">
		<a href="<?php echo site_url('admin/log/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="col-2" style="float:left;">
		<i class="mdi mdi-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/log/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>HTML</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="col-8" style="float:right;">
                <?php echo form_open_multipart('admin/log/search/',array("class"=>"form-horizontal")); ?>
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

   
<!--Data display of log-->
<div class="card">
                  <div class="card-body">       
<table class="table table-striped table-bordered">
    <tr>
        <th>Users</th>
        <th>Action</th>
        <th>Ip</th>     
        <th>Created At</th>      
        <th>Actions</th>
    </tr>
	<?php foreach($log as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['first_name'].' '.$dataArr['last_name'].' '.$dataArr['email'];?>
									</td>
<td><?php echo $c['action']; ?></td>
<td><?php echo $c['ip']; ?></td>
<td><?php echo $c['created_at']; ?></td>

		<td><a
			href="<?php echo site_url('admin/log/details/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-eye"></i></a> <a
			href="<?php echo site_url('admin/log/save/'.$c['id']); ?>"
			class="action-icon"> <i class="mdi mdi-table-edit"></i></a> <a
			href="<?php echo site_url('admin/log/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="mdi mdi-delete"></i></a></td>
    </tr>
	<?php } ?>
</table>
</div>
</div>
<!--End of Data display of log//--> 

<!--No data-->
<?php
	if(count($log)==0){
?>
 <div align="center"><h3>Data is not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
