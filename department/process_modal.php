<!-- Edit -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 style="text-align:center;" class="modal-title" id="myModalLabel">Complainant</h4>
            </div>
            <div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="process.php?blotter_id=<?php echo $data['blotter_id'];?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Fullname</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="firstname" value="<?php echo $data['n_complainant']; ?>" >
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Age</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="lastname" value="<?php echo $data['comp_age']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Gender:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="address" value="<?php echo $data['comp_gender']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" style="position:relative; top:7px;">Address:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="address" value="<?php echo $data['comp_address']; ?>">
							</div>
						</div>
					</div> 
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						<button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
					</form>
            </div>
        </div>
    </div>
</div>
