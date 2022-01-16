// Welcome message based on time of day 

var date = new Date();
var hour = date.getHours();
var display;

if (hour >= 0 && hour < 6) {
    display = "Good morning, you must be an early bird!";
} else if (hour >= 6 && hour < 12) {
    display = "Good morning!";
} else if (hour >= 12 && hour < 18) {
    display = "Good afternoon!"; 
} else {
    display = "Good evening!";
}    
document.getElementById("welcome").innerHTML = display


   