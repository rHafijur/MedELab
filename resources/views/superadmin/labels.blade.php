
<!DOCTYPE html>
<html>
<head>
	<title>Labels</title>
	<style type="text/css">
		.label{
			width: 190px;
			height: 74px;
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
		<table>
		@for($i=1;$i<=$number*12;$i++)

					@php
						$uniqId=abs( crc32( uniqid() ) );;
					@endphp
					<tr>
						<td>
							<div class="label">
										<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(60)->generate($uniqId)) }} ">
								
								<span  style="letter-spacing: 3px">{{$uniqId}}</span>

							</div>
						</td>
						@php
							$uniqId=abs( crc32( uniqid() ) );;
						@endphp
						<td>
							<div class="label">
										<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(60)->generate($uniqId)) }} ">
								
								<span  style="letter-spacing: 3px">{{$uniqId}}</span>

							</div>
						</td>
						@php
							$uniqId=abs( crc32( uniqid() ) );;
						@endphp
						<td>
							<div class="label">
										<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(60)->generate($uniqId)) }} ">
								
								<span  style="letter-spacing: 3px">{{$uniqId}}</span>

							</div>
						</td>
						@php
							$uniqId=abs( crc32( uniqid() ) );;
						@endphp
						<td>
							<div class="label">
										<img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(60)->generate($uniqId)) }} ">
								
								<span  style="letter-spacing: 3px">{{$uniqId}}</span>

							</div>
						</td>
					</tr>
			
			
		@endfor
	</table>
	</div>
	{{-- <p style="font-size: 100px">Hello world</p> --}}
</body>
</html>