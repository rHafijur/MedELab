<!DOCTYPE html>
<html>
<head>
  <title>ID card - {{$patient->user->name}}</title>
  <style type="text/css">
    body{
      font-size: 32px;
    }
    div{
      margin-top: 20px;
    }
  </style>
</head>
<body>
<div>
  <strong>ID:</strong> {{$patient->id}}
</div>
<div>
  <strong>Name:</strong> {{$patient->user->name}}
</div>
<div>
  <strong>Phone:</strong> {{$patient->phone}}
</div>
<div>
  <strong>Word:</strong> {{$patient->word->title}}
</div>
<div>
  <strong>Bed:</strong> {{$patient->bed}}
</div>
<div>
  <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(250)->generate($patient->id)) }} ">
</div>
</body>
</html>