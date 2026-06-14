function showGreeting() {
    var fanName = document.getElementById("fanName");
    var favorite = document.getElementById("favoriteArea");
    var result = document.getElementById("welcomeResult");

    if (!fanName || !favorite || !result) return;

    if (fanName.value.trim() === "") {
        alert("אנא הכנס שם אוהד");
        return;
    }

    result.innerHTML = "ברוך הבא " + fanName.value + "! שמחנו לראות שהתחום שהכי מעניין אותך הוא: " + favorite.value + ".";
}

function calculateShopTotal() {
    var scarf = parseInt(document.getElementById("scarfQty").value) || 0;
    var shirt = parseInt(document.getElementById("shirtQty").value) || 0;
    var flag = parseInt(document.getElementById("flagQty").value) || 0;

    var total = scarf * 50 + shirt * 120 + flag * 35;
    document.getElementById("shopResult").innerHTML = "הסכום הכולל להזמנה הוא: " + total + " ₪";
}

function joinClub() {
    var fullName = document.getElementById("fullName").value.trim();
    var city = document.getElementById("city").value.trim();
    var membership = document.getElementById("membership").value;

    if (fullName === "" || city === "") {
        alert("נא למלא שם ועיר לפני שליחה");
        return;
    }

    document.getElementById("joinResult").innerHTML =
        "תודה " + fullName + "! הבקשה שלך למסלול " + membership + " התקבלה בהצלחה.";
}

function showEventMessage(type) {
    var output = document.getElementById("eventResult");
    if (!output) return;

    if (type === "watch") {
        output.innerHTML = "תרשם בעמוד ההרשמה שלנו !!";
    } else if (type === "travel") {
        output.innerHTML = "תרשם בעמוד ההרשמה שלנו !!";
    } else {
        output.innerHTML = "תרשם בעמוד ההרשמה שלנו !!";
    }
}

function showGameInfo(team, date, location) {
    var result = document.getElementById("gameInfo");
    if (!result) return;

    result.innerHTML = "המשחק מול " + team + " יתקיים בתאריך " + date + " במיקום: " + location + ".";
}

function sendContact() {
    var name = document.getElementById("contactName").value.trim();
    if (name === "") {
        alert("נא למלא שם לפני שליחת פנייה");
        return;
    }

    document.getElementById("contactResult").innerHTML = "תודה " + name + ", פנייתך נשלחה בהצלחה.";
}

function showLeaderDetails() {
    document.getElementById("leaderResult").innerHTML =
        "אימייל של נדב ונכניס גם תמונה";
}

function sendMemberMessage(memberId) {
    var target = document.getElementById(memberId);
    if (target) {
        target.innerHTML = "תודה רבה ,עבדנו קשה";
    }
}

function showFanBenefits() {
    var answer = confirm("האם להציג את יתרונות האתר?");
    var result = document.getElementById("benefitsOutput");

    if (answer == true) {
        var benefits = [
            "מידע על משחקים קרובים",
            "הצטרפות למועדון האוהדים",
            "מידע על אירועים ונסיעות",
            "חנות אוהדים",
            "יצירת קשר עם הצוות"
        ];

        var text = "<ul>";

        for (var i = 0; i < benefits.length; i++) {
            text = text + "<li>" + benefits[i] + "</li>";
        }

        text = text + "</ul>";

        result.innerHTML = text;
        console.log("רשימת היתרונות הוצגה בהצלחה");
        alert("היתרונות הוצגו באתר");
    } else {
        result.innerHTML = "בחרת לא להציג את היתרונות.";
    }
}

function sendMail() {
    var fullName = document.getElementById("contactName").value;
    var email = document.getElementById("contactEmail").value;
    var phone = document.getElementById("contactPhone").value;
    var city = document.getElementById("contactCity").value;
    var message = document.getElementById("contactMessage").value;

    var topic = "";
    var topics = document.getElementsByName("topic");

    for (var i = 0; i < topics.length; i++) {
        if (topics[i].checked) {
            topic = topics[i].value;
        }
    }

    var updates = document.getElementById("updates").checked;

    var mailBody =
        "שם מלא: " + fullName + "\n" +
        "אימייל: " + email + "\n" +
        "טלפון: " + phone + "\n" +
        "עיר: " + city + "\n" +
        "נושא הפנייה: " + topic + "\n" +
        "מעוניין לקבל עדכונים: " + updates + "\n\n" +
        "תוכן הפנייה:\n" + message;

    var mailSubject = "פנייה מאתר Blue & White Fans";

    window.location.href =
        "mailto:bluewhitefansil@gmail.com" +
        "?subject=" + encodeURIComponent(mailSubject) +
        "&body=" + encodeURIComponent(mailBody);
}