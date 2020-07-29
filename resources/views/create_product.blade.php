<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Thêm Mới</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<form action="" method="POST" enctype="multipart/form-data">
						@csrf
						<legend>Thêm Mới Sản Phẩm</legend>
					
						<div class="form-group">
							<label for="">Tên Sản Phẩm</label>
							<input type="text" class="form-control" id="" name="name" value="" placeholder="Input field">
						</div>

						<div class="form-group">
							<label for="">Giá Sản Phẩm</label>
							<input type="text" class="form-control" id="" name="price" placeholder="Input field">
						</div>

						<div class="form-group">
							<label for="">Hình Ảnh</label>
							<input type="file" class="form-control" id="" name="images" placeholder="Input field">
						</div>

						<div class="form-group">
							<label for="">Trạng Thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1" checked="checked">
									Đang Hoạt Động

									<br>

									<input type="radio" name="status" id="input" value="0">
									Chưa Hoạt Động
								</label>
							</div>
						</div>



						<div class="form-group">
							<label for="">Danh Mục</label>
							<select name="category_id" id="input" class="form-control">
								<option value="">--Mời Bạn Chọn Danh Mục--</option>
								@foreach($category as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
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