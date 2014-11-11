<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Video Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editvideosubmit');?>" >
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="hidden" id="normal-field" class="row-fluid hidden" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Location</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Youtube Link</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="youtube" value="<?php echo set_value('youtube',$before->youtube);?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before->description);?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$before->order);?>">
						</div>
					</div>		
					
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>