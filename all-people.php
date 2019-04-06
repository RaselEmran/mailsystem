<?php include_once 'inc/header.php'; 

?>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Basic</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th><?php echo date("Y-m-d"); ?></th>
											<th>Nationality</th>
											<th>Type</th>
											<th>Name</th>
											<th>Passport </th>
											<th>Phone</th>
											<th>Birth Day</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

		<?php 
		$all_people = $info->all_people();
		$i = 0;
		foreach ($all_people as $key => $value) {
		$i++;	

	 ?>									<tr class="gradeX">
												<td><?php echo date('H:i'); ?></td>
												<td><?php echo $value['nationality'] ?></td>
												<td><?php echo $value['type'] ?></td>
												<td><?php echo ucwords($value['first']) ?> &nbsp <?php echo ucwords($value['surname']) ?></td>
												<td><?php echo ucwords($value['passport']) ?></td>

												<td class="center hidden-phone"><?php echo $value['phone'] ?></td>
												<td class="center hidden-phone"><?php echo $value['birth'] ?>

												<td>
													<a  class="btn btn-success" href="mail.php?mail=<?php echo $value['id'] ?>">Mail</a>
													<a class="btn btn-info" href="edit.php?edit=<?php echo $value['id'] ?>">Edit</a> <a  class="btn btn-danger" onclick="return confirm('Are Yor Sure To Delete?')" href="?delete=<?php echo $value['id'] ?>">Delete</a></td>
											</tr>
		<?php } ?>
									</tbody>
								</table>
							</div>
						</section>
			</div>

			
		<!-- Vendor -->
		<?php include_once 'inc/footer.php'; ?>