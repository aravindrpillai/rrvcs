<?php if($value == "message"): ?>

<h2> Quick Message Service </h2>
<form action='admin.php' method='POST'>
<textarea name='message' rows='6' cols='30' style='height:80px; width:450px;'></textarea>

<input type='hidden' value='yes' name='allow_access'>
<br><br><input type='submit' value='Send SMS' name='message_submit' style='height:30px; width:150px;'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset box' style='height:30px; width:150px;'>
</form>

<?php endif; ?>