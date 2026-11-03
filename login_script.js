document.querySelector(".container").classList.add("hidden");
setTimeout(function(){
   document.getElementById("myDiv").style.display = "none";
   document.querySelector(".container").classList.remove("hidden");
}, 5000);
let container = document.getElementById('container');
toggle = () => {
   container.classList.toggle('sign-in');
   container.classList.toggle('sign-up');
}
setTimeout(() => {container.classList.add('sign-in');}, 5200); 