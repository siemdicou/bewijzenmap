// window.addEventListener("load", function() {
// 	var student = {
// 		name: "siem",
// 		lastname: "dicou",
// 		age: 19,
// 		classes:[
// 		{
// 			name: "rek",
// 			teacher: "homg",
// 			cijfer: 7.7,
	
// 		},
// 		{
// 			name: "dir",
// 			teacher: "theo",
// 			cijfer: 9.7,

// 		}]
// 	};


// 	var	highscores = {
// 		first: 2139,
// 		second:1830,
// 	};

// 	var json = JSON.stringify(student);
// 	console.log(json);
//})

    // we maken een xmlHTTPRequest aan
    var req = new XMLHttpRequest();
    // welke url moet er worden opgehaald?
    req.open('GET', 'new.php', true);

    // we voegen een 'listener' toe om te kijken of de pagina geladen is
    // je kunt ook andere events gebruiken zoals readystatechange
    req.addEventListener('load', function () {
        var jsonString = req.responseText;
        console.log(JSON.parse(jsonString));
    });

    // we starten het laden van de pagina
    req.send();