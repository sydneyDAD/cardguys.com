<form method="GET" action="">
	<input type="hidden" name="module" value="<?=$menu->module?>"/>
	<input type="hidden" name="view" value="list"/>
	<select name="position">
		<option value="">Menu Position</option>
		<option value="top">Top</option>
        <option value="bottom">Bottom</option>
		<option value="left">Left</option>
	</select>
	<input type="submit" value="Filter"/>
</form>