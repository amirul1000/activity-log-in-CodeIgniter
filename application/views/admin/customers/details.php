<a href="<?php echo site_url('admin/customers/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Customers'); ?></h5>
<!--Data display of customers with id-->
<?php
$c = $customers;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Full Name</td>
		<td><?php echo $c['full_name']; ?></td>
	</tr>

	<tr>
		<td>Address</td>
		<td><?php echo $c['address']; ?></td>
	</tr>

	<tr>
		<td>Postcode</td>
		<td><?php echo $c['postcode']; ?></td>
	</tr>

	<tr>
		<td>Home Telephone</td>
		<td><?php echo $c['home_telephone']; ?></td>
	</tr>

	<tr>
		<td>Mobile Mumber</td>
		<td><?php echo $c['mobile_mumber']; ?></td>
	</tr>

	<tr>
		<td>Notes</td>
		<td><?php echo $c['notes']; ?></td>
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
<!--End of Data display of customers with id//-->
