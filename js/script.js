// write a function to get and display current date
let setDate = document.getElementById("setDate");
let today = new Date().toLocaleDateString();
setDate.innerText = today;
