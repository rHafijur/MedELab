
<!DOCTYPE html>
<html>
<head>
	<title>Labels</title>
	<style type="text/css">
		.label{
			width: 200px;
			height: 90px;
			/*float: left;*/

		}
		.container{
			display: block;
			width: 600px;
		}
	</style>
</head>
<body>
	<div class="container">
		@for($i=1;$i<=100;$i++)

				@php
					$uniqId=abs( crc32( uniqid() ) );;
				@endphp
					<div class="label">
								<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(60)->generate($uniqId)) }} ">
						
						<span  style="letter-spacing: 4px">{{$uniqId}}</span>

					</div>
			
			
		@endfor
	</div>
	{{-- <p style="font-size: 100px">Hello world</p> --}}
</body>
</html>