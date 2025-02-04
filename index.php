<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bb = $_POST["bb"];
    $tb = $_POST["tb"] / 100; 
    
    if ($bb > 0 && $tb > 0) {
        $bmi = $bb / ($tb * $tb);
        $bmi = round($bmi, 2);
        
        if ($bmi < 17) {
            $status = "Kurus. Kekurangan berat badan berat";
        } elseif ($bmi >= 17.0 && $bmi < 18.4) {
            $status = "Kurus. Kekurangan berat badan ringan";
        } elseif ($bmi >= 18.5 && $bmi < 25.0) {
            $status = "Normal";
        } elseif ($bmi >= 25.1 && $bmi < 27.0) {
            $status = "Gemuk. Kelebihan berat badan ringan";
        } elseif ($bmi >= 27.1) {
            $status = "Gemuk. Kelebihan berat badan berat";
        } else {
            $status = "Obesitas";
        }
    } else {
        $bmi = "Nilai tidak valid";
        $status = "Masukkan nilai yang valid";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>BMI Kalkulator</h2>
    <form method="post">
        <label for="bb">Berat Badan (kg):</label>
        <input type="number" step="0.1" name="bb" required><br>
        <label for="tb">Tinggi Badan (cm):</label>
        <input type="number" step="0.1" name="tb" required><br>
        <button type="submit">Coba Hitung</button>
    </form>
    
    <?php if (isset($bmi)): ?>
        <h3>BMI: <?php echo $bmi; ?></h3>
        <h3>Status: <?php echo $status; ?></h3>
    <?php endif; ?>
</body>
</html>
