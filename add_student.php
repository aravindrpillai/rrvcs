<?php if($value == "add_student"): ?>


<form action='student_page.php' method='POST'> 
<h2><input type='submit' value='click here to add new student' name='add_new_student' style='height:30px; width:250px;'></h2> 
</form> 

<br><br><h2> Edit Student Data</h2> 
<form action='student_page.php' method='POST'> 
<table> 
<tr><td><font size='2'>Student name </font></td><td><input type='text' name='student_name' style='height:30px; width:350px;'></td></tr> 
<tr><td><font size='2'>Student Admission No </font></td><td> <input type='text' name='student_adno' style='height:30px; width:350px;'></td></tr> 

<tr><td><font size='2'>Class and Division </font></td><td> 
<select name='student_class' style='height:30px; width:80px;'> 
<option>class</option><option>12</option><option>11</option>
<option>10</option><option>9</option><option>8</option><option>7</option>
<option>6</option><option>5</option><option>5</option><option>4</option>
<option>3</option><option>2</option><option>1</option><option>UKG</option>
<option>LKG</option> 
</select> 

&nbsp;<select name='student_division' style='height:30px; width:80px;'> 
<option>Div</option><option>A</option><option>B</option><option>C</option><option>D</option><option>E</option><option>F</option> 
</select></td></tr> 

<tr><td><font size='2'>Gender </font></td><td> 
<select name='gender' style='height:30px; width:80px;'> 
<option>All</option><option>Male</option><option>Female</option> 
</select> 

<tr><td><font size='2'>Category </font></td><td> 
<select name='caste_type' style='height:30px; width:80px;'> 
<option>All</option><option>General</option><option>OBC</option> 
</select> 

<tr><td></td><td><input type='submit' value='Find Student' name='edit_student_data' style='height:30px; width:100px;'></td></tr> 
</table> 
</form> 
 

<?php endif; ?>