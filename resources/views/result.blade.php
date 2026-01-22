<!DOCTYPE html>
<html>
<head>
    <title>Hasil Analisis - FitSense</title>
</head>
<body>

<h2>Hasil Analisis Kebugaran</h2>

<p><b>Fitness Level:</b> {{ $fitnessLevel }}</p>
<p><b>BMR:</b> {{ round($bmr, 2) }} kkal</p>
<p><b>Kebutuhan Kalori Harian (TDEE):</b> {{ round($tdee, 2) }} kkal</p>
<p><b>Estimasi Kalori Latihan:</b> {{ round($caloriesBurned, 2) }} kkal</p>

<p><b>Intensitas:</b> {{ $intensity }}</p>
<p><b>Durasi Disarankan:</b> {{ $recommendedDuration }}</p>

<h3>Rekomendasi Olahraga:</h3>
<ul>
    @foreach($workouts as $workout)
        <li>{{ $workout }}</li>
    @endforeach
</ul>

<a href="/">← Back</a>

</body>
</html>
