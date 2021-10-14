<?php
?>

<!DOCTYPE html>
<html>
<body>

<h1>Hier kunnen leerlingen hun cijfers bekijken</h1>
@foreach ($grades as $grade)

<p>{{$grade->grade}}</p>
    @endforeach
</body>
</html>
