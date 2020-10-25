
<?php 
	$employees = DB::table('employees')->where('id',$result)->first();
?>
		
<form method="post" action="/processeditemployee" enctype="multipart/form-data">
	{{ csrf_field() }}
	<span>First Name:</span><br>
	<input type="text" name="firstname" value="{{$employees->firstname}}" required>
	<input type="hidden" name="id" value="{{$employees->id}}">
	<br><br>
	
	<span>Last Name:</span><br>
	<input type="text" name="lastname" value="{{$employees->lastname}}" required>
	<br><br>
	
	<span>Age:</span><br>
	<input type="text" name="age" value="{{$employees->age}}" required>
	<br><br>
	
	<span>Job Title:</span><br>
	<input type="text" name="jobtitle" value="{{$employees->job_title}}" required>
	<br><br>
	
	<span>Access level:</span><br>
	<input type="text" name="accesslevel" value="{{$employees->access_level_id}}" required>
	<br><br>
	
	<span>Password:</span><br>
	<input type="text" name="password" value="{{$employees->password}}" required>
	<br><br>
	
	<span>Birth_date:</span><br>
	@if(!empty($employees->firstname))
		<input type="text" name="birthdate" value="{{$employees->birth_date}}" required>
	@else
		<input type="date" name="birthdate" required>
	@endif
	<br><br>
	
	<button type="submit"> SUBMIT </button>
</form>