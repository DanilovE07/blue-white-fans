<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <title>הרשמה למועדון עם MySQL</title>
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
        <h1>הרשמה למועדון האוהדים </h1>
        <p>הטופס מוסיף אוהד חדש לטבלה ומציג את הטבלה המעודכנת באתר.</p>
    </div>
</section>

<section class="section">
    <div class="container split">

        <div class="panel">
            <h2>טופס הרשמה</h2>

            <form action="join_db.php" method="post">
                <div class="form-row">
                    <label for="fullName">שם מלא</label>
                    <input type="text" id="fullName" name="fullName" placeholder="הכנס שם מלא">
                </div>

                <div class="form-row">
                    <label for="email">אימייל</label>
                    <input type="email" id="email" name="email" placeholder="הכנס אימייל">
                </div>

                <div class="form-row">
                    <label for="city">עיר</label>
                    <input type="text" id="city" name="city" placeholder="הכנס עיר">
                </div>

                <div class="form-row">
                    <label for="membershipType">סוג חברות</label>
                    <select id="membershipType" name="membershipType">
                        <option value="רגילה">רגילה</option>
                        <option value="זהב">זהב</option>
                        <option value="משפחתית">משפחתית</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" name="submitFan" value="הוסף אוהד לטבלה">
                <input type="reset" class="btn btn-primary" value="נקה">
            </form>
        </div>

        <div class="panel">
            <h2>הסבר</h2>
            <p class="meta">
                דף זה משתמש ב־PHP בצד השרת, מקבל נתונים מהטופס בעזרת POST,
                מכניס אותם לטבלת MySQL, ואז מציג את הרשומות הקיימות בטבלה.
            </p>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="panel">
            <h2>טבלת אוהדים רשומים</h2>

<?php

$servername = "sql312.byethost18.com";
$username = "b18_41919643";
$password = "Password";
$dbname = "b18_41919643_fans";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submitFan"])) {
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $membershipType = $_POST["membershipType"];

    if ($fullName != "" && $email != "" && $city != "") {

    $sqlCheck = "SELECT * FROM fans WHERE email = '".$email."'";
    $checkResult = $conn->query($sqlCheck);

    if ($checkResult->num_rows > 0) {
        echo "<div class='notice'>האימייל כבר קיים במערכת, לא ניתן להירשם פעמיים עם אותו אימייל.</div>";
    } else {
        $sqlInsert = "INSERT INTO fans (full_name, email, city, membership_type)
                      VALUES ('".$fullName."', '".$email."', '".$city."', '".$membershipType."')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "<div class='notice'>האוהד נוסף לטבלה בהצלחה.</div>";
        } else {
            echo "<div class='notice'>שגיאה בהוספה: " . $conn->error . "</div>";
        }
    }

    } else {
    echo "<div class='notice'>נא למלא שם, אימייל ועיר.</div>";
    }
}

$sqlSelect = "SELECT id, full_name, email, city, membership_type FROM fans";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    echo "<table class='games-table'>";
    echo "<tr>";
    echo "<th>מספר</th>";
    echo "<th>שם מלא</th>";
    echo "<th>אימייל</th>";
    echo "<th>עיר</th>";
    echo "<th>סוג חברות</th>";
    echo "</tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["membership_type"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>עדיין אין אוהדים רשומים בטבלה.</p>";
}

$conn->close();

?>

        </div>
    </div>
</section>

<footer>
    <div class="small-center">כל הזכויות שמורות © Sterlings </div>
</footer>

</body>
</html>
