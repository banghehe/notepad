<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<form action="" method="POST" role="form">
					@csrf
						<legend>Đăng Ký</legend>
					
						<div class="form-group">
							<label for="">Tên Người Dùng</label>
							<input type="text" class="form-control" id="" placeholder="Input field"  name="name">
						</div>	
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="email">
						</div>
						<div class="form-group">
							<label for="">Mật Khẩu</label>
							<input type="password" class="form-control" id="" placeholder="Input field" name="password">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>