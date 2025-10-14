<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> @vite('resources/css/app.css')
  @vite('resources/js/app.js')

  <title inertia>Aung Academy Language School</title>
  <meta name="description" content="Learn English, IELTS, and more at Aung Academy Language School.">
  <meta name="keywords" content="English courses, IELTS, Myanmar, language school">
  <meta name="author" content="Aung Academy">
  <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">


  @inertiaHead
</head>

<body>
  @routes
  @inertia

</body>

</html>