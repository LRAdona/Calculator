<form method="post" action="/processaddemployee" enctype="multipart/form-data">
	{{ csrf_field() }}
	<span>First Name:</span><br>
	<input type="text" name="firstname" required>
	<br><br>
	
	<span>Last Name:</span><br>
	<input type="text" name="lastname" required>
	<br><br>
	
	<span>Age:</span><br>
	<input type="text" name="age" required>
	<br><br>
	
	<span>Job Title:</span><br>
	<input type="text" name="jobtitle" required>
	<br><br>
	
	<span>Access level:</span><br>
	<input type="text" name="accesslevel" required>
	<br><br>
	
	<span>Password:</span><br>
	<input type="text" name="password" required>
	<br><br>
	
	<span>Birth_date:</span><br>
	<input type="date" name="birthdate" required>
	<br><br>
	
	<button type="submit"> SUBMIT </button>
</form>