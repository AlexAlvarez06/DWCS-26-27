<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora de Peso Ideal</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem;
        }

        .result {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h2>Calculadora de Peso Ideal</h2>
    <form method="POST" action="">
        <label for="gender">Género:</label>
        <select name="gender" id="gender" required>
            <option value="male">Hombre</option>
            <option value="female">Mujer</option>
        </select>
        <br><br>

        <label for="height">Altura (en metros, ej: 1.70):</label>
        <input type="number" name="height" id="height" step="0.01" min="1.40" max="2.20" required>
        <br><br>

        <label for="weight">Peso actual (en kg):</label>
        <input type="number" name="weight" id="weight" step="0.1" required>
        <br><br>

        <button type="submit">Calcular Peso Ideal</button>
    </form>

    <hr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gender = $_POST["gender"];
        $height_cm = floatval($_POST["height"]) * 100;
        $current_weight = floatval($_POST["weight"]);
        $ideal_weight = 0;

        if ($gender == "male") {
            $ideal_weight = ($height_cm * 1.2) - 130;
        } else {
            $ideal_weight = $height_cm - 102;
        }
        $ideal_weight = round($ideal_weight);

        echo "<div class =result></div>";
        echo "<h3>Resultado</h3>";

        $gender_text = ($gender === "male") ? "Hombre" : "Mujer";
        $height_m = $height_cm / 100;

        echo "<p>Tu peso actual: <strong>{$current_weight} kg</strong></p>";
        echo "<p>Peso ideal para $gender_text de {$height_m}m: <strong>{$ideal_weight} kg</strong></p>";
    }




    ?>
</body>

</html>