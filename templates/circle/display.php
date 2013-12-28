<?php
?>

<form action="index.php?view=circle&task=save" method="post">
	
<p>
	Group Id
	<input type="text" name="chatter[circle][_id]" value=""/>
</p>

<p>
	Title
	<input type="text" name="chatter[circle][title]" value=""/>
</p>

<p>
	Owner
	<input type="text" name="chatter[circle][owner]" value=""/>
</p>

<p>
	Creation Time
	<input type="text" name="chatter[circle][creation_time]" value=""/>
</p>

<p>
	Access Level
	<input type="text" name="chatter[circle][access_level]" value=""/>
</p>

<p>
	Param name 1
	<input type="text" name="chatter[circle][params][name1]" value=""/>
</p>

<p>
	<input type="submit" name="Save" value="save" />
</p>

</form>
<?php 