<?php
?>

<div class="span2 chatter-sidebar">
	<?php include_once FA_PATH_TEMPLATES.'/sidebar-left.php';?>
</div>
  		 		

	<div class="span9" id="main-body">
		<div id="header">
			<h1>Circle</h1>
		</div>

		<div>
			<form action="index.php?view=circle&task=save" method="post" class="form-horizontal">			
				<div class="control-group">
					<div class="control-label">Group Id</div>
					<div class="controls">
						<input type="text" name="chatter[circle][_id]" value=""/>
					</div>
				</div>
					
				<div class="control-group">
					<div class="control-label">Title</div>
					<div class="controls">
						<input type="text" name="chatter[circle][title]" value=""/>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label">Owner</div>
					<div class="controls">
						<input type="text" name="chatter[circle][owner]" value=""/>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label">Creation Time</div>
					<div class="controls">
						<input type="text" name="chatter[circle][creation_time]" value=""/>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label">Access Level</div>
					<div class="controls">
						<input type="text" name="chatter[circle][access_level]" value=""/>
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label">Param name 1</div>
					<div class="controls">
						<input type="text" name="chatter[circle][params][name1]" value=""/>
					</div>
				</div>
				
				
				<div class="control-group">
					<div class="control-label">&nbsp;</div>
					<div class="controls">
						<button type="submit" class="btn btn-success" name="Save" value="save">Save</button>
					</div>
				</div>			
			</form>
		</div>
</div>


<?php 