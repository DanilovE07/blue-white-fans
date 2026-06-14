<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <title>תוצאת התאמה לאירוע אוהדים</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="navbar">
        <div class="brand">
            <div class="logo-circle">★</div>
            <div>Blue & White Fans</div>
        </div>

        <nav class="nav-links">
            <a href="index.html">דף הבית</a>
            <a href="games.html">משחקים קרובים</a>
            <a href="join.html">סוגי חברות</a>
            <a href="join_db.php">הרשמה למועדון</a>
            <a href="events.html">אירועים ונסיעות</a>
            <a href="fan_event_check.html">התאמה לאירוע אוהדים</a>
            <a href="shop.html">חנות אוהדים</a>
            <a href="contact.html">צור קשר</a>
            <a href="team.html">דף צוות</a>
        </nav>
    </div>
</header>

<section class="page-hero">
    <div class="container">
        <h1>תוצאת התאמה לאירוע אוהדים</h1>
        <p>הנתונים עובדו בצד השרת בעזרת PHP.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="panel">

<?php

function calculateActivityPrice($activityType, $participants)
{
    if ($activityType == "צפייה משותפת") {
        $pricePerPerson = 30;
    } else if ($activityType == "נסיעה למשחק") {
        $pricePerPerson = 90;
    } else {
        $pricePerPerson = 20;
    }

    return $pricePerPerson * $participants;
}

$fanName = $_POST["fanName"];
$age = $_POST["age"];
$city = $_POST["city"];
$participants = $_POST["participants"];
$activityType = $_POST["activityType"];

$nameLength = strlen($fanName);
$totalPrice = calculateActivityPrice($activityType, $participants);

$benefits = array(
    "קבלת עדכונים על משחקי נבחרת ישראל",
    "אפשרות להצטרף לאירועים ונסיעות",
    "חיבור לקהילת אוהדים כחול-לבן",
    "קבלת מידע על פעילויות עתידיות"
);

echo "<h2>שלום " . $fanName . "</h2>";
echo "<p>עיר מגורים: " . $city . "</p>";
echo "<p>גיל: " . $age . "</p>";
echo "<p>מספר המשתתפים: " . $participants . "</p>";
echo "<p>הפעילות שבחרת: " . $activityType . "</p>";
echo "<p>אורך השם שהוזן הוא: " . $nameLength . " תווים</p>";

if ($age < 18) {
    echo "<div class='notice'>המלצה: כדאי להגיע לאירוע בליווי מבוגר.</div>";
} else {
    echo "<div class='notice'>המערכת זיהתה שאתה יכול להשתתף באופן עצמאי באירוע.</div>";
}

echo "<h3>עלות משוערת לפעילות: " . $totalPrice . " ₪</h3>";

echo "<h3>הטבות מומלצות עבורך:</h3>";
echo "<ul class='benefits-list'>";

for ($i = 0; $i < count($benefits); $i++) {
    echo "<li>" . $benefits[$i] . "</li>";
}

echo "</ul>";

echo "<p class='meta'>הפעילות המתאימה לך לפי הבחירה שלך היא: " . $activityType . ".</p>";

?>

            <br>
            <a class="btn btn-primary" href="fan_event_check.html">חזרה לטופס התאמה</a>
            <a class="btn btn-primary" href="events.html">מעבר לאירועים ונסיעות</a>

        </div>
    </div>
</section>

<footer>
    <div class="small-center">כל הזכויות שמורות © Sterlings </div>
</footer>

</body>
</html>