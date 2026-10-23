<?php
$grade = 9;
if ($grade >= 9) {
    $result = "Excellent";
} elseif ($grade >= 7) {
    $result = "Very Good";
} elseif ($grade >= 5) {
    $result = "Pass";
} else {
    $result = "Fail";
}
echo "Grade: $grade<br>";
echo "Result: $result<br>";
