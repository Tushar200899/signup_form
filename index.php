<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-up form</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<main>
		<section>
			<div class="col-sm-12">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="group">
						<h1>Sign-up</h1>
						<form>
							<div class="form-label">
								<label  for="name">Name</label>
								<input type="text" name="name" id="name" placeholder="Enter your name" required="text">
								<label for="username">Username</label>
								<input type="email" name="username" id="username" placeholder="Enter your email" required="email">
                                <label for="phone_no.">Phone no.</label>
                                <input type="text" name="phone_no" id="phone_no" placeholder="contact no." required="text">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender">
                                	<option value="male">Male</option>
                                	<option value="female">Female</option>
                                	<option value="others">Others</option>
                                </select>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter your password" required="password">
                                <label for="cpassword">Confirm password</label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="re-enter your password" required="password">
							</div>
                            <div class="submission">
                            	<button type="submit" id="submit1" onclick="sendsignup();">Submit</button>
                            </div>
						</form>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</section>
	</main>
	<script type="text/javascript">
		function sendsignup()
		{
			var name = document.getElementById('name').value;
			var username = document.getElementById('username').value;
			var phone_no = document.getElementById('phone_no').value;
			var gender = document.getElementById('gender').value;
			var password = document.getElementById('password').value;
			var cpassword = document.getElementById('cpassword').value;
			var token = "<?php echo password_hash("signuptoken",PASSWORD_DEFAULT);?>"
			if(name != "" && username != "" && password !="" && cpassword != "" && phone_no != "" && gender != "")
			{
				if( password == cpassword)
				{
					$.ajax(
				{
					type:'post',
					url:"ajax/signup.php",
					data:{name:name,username:username,phone_no:phone_no,gender:gender,password:password,cpassword:cpassword,token:token},
					success:function(data)
					{
						alert(data);
					}
				});
				}
				else
				{
					alert('Please fill confirm password same as password');
				}
			}
			else
			{
				alert('Please fill all fields!');
			}
		}
	</script>
	<script type="text/javascript">
        $('form').submit(function(e) {
        e.preventDefault();
        });
    </script>
</body>
</html>