<!DOCTYPE html>
<html>
<head>
    <title>FitSense - Agent Kebugaran</title>
</head>
<body>

<h2>FitSense – Agent Cerdas Rekomendasi Kebugaran</h2>

<form method="POST" action="{{ route('process') }}">
    @csrf

    Umur: <input type="number" name="age" required><br><br>

    Jenis Kelamin:
    <select name="gender">
        <option value="male">Laki-laki</option>
        <option value="female">Perempuan</option>
    </select><br><br>

    Tinggi Badan (cm): <input type="number" name="height" required><br><br>
    Berat Badan (kg): <input type="number" name="weight" required><br><br>

    Rata-rata BPM: <input type="number" name="bpm" required><br><br>
    Durasi Latihan (menit): <input type="number" name="duration" required><br><br>

    Aktivitas Harian:
    <select name="activity">
        <option value="low">Rendah</option>
        <option value="medium">Sedang</option>
        <option value="high">Tinggi</option>
    </select><br><br>

    <button type="submit">Analisis Kebugaran</button>
</form>

</body>
</html>
