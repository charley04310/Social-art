
function SetModal(){

    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("Login");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}



function ModalAddArticle(){

    var modal = document.getElementById("AddArticle");
    
    // Get the button that opens the modal
    var btn = document.getElementById("AddPost");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[1];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}


function EditInf(){

    var modal = document.getElementById("EditInf");
    
    // Get the button that opens the modal
    var btn = document.getElementById("User");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[2];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}

function darkMode(){
  var toggled =false;
 
var welcoming = document.getElementById("container-welcoming");
var navLeftFixed = document.getElementById("left_fixed_navigation");
var headerContainer = document.getElementById("header-container");
var switchHolder = document.getElementById("outer-div");
var switchButton = document.getElementById("inner-div");

switchButton.addEventListener('click',function () {
  if(!toggled){
  switchButton.style.transition =".4s all ease-in-out";
  switchButton.style.transform ="translateX(25px)";
  switchButton.style.backgroundColor = "white";
  switchHolder.style.border= "2px solid white";
  document.body.style.backgroundColor = "#1d222f";
  headerContainer.style.backgroundColor = "#262b37"
  navLeftFixed.style.backgroundColor = "#262b37";
  welcoming.style.color ="white";
  toggled = true;
  }else{

  switchButton.style.transition =".4s all ease-in-out";
  headerContainer.style.backgroundColor = "#d6d6d6"
  navLeftFixed.style.backgroundColor = "#707070";
  switchButton.style.transform ="translateX(4px)";
  switchButton.style.backgroundColor = "#f07d2d";
  switchHolder.style.border= "2px solid #f07d2d";
  document.body.style.backgroundColor = "white";
  headerContainer.style.backgroundColor = "white";
  welcoming.style.color = "black";
  toggled = false;
  }
});

}

/*
function darkMode(){
    var toggled =false;
   
var welcoming = document.getElementById("container-welcoming");
var navLeftFixed = document.getElementById("left_fixed_navigation");
var headerContainer = document.getElementById("header-container");
var switchHolder = document.getElementById("outer-div");
var switchButton = document.getElementById("inner-div");
var titreUn = document.getElementById("h1")

switchButton.addEventListener('click',function () {
    if(!toggled){
    switchButton.style.transition =".4s all ease-in-out";
    switchButton.style.transform ="translateX(25px)";
    switchButton.style.backgroundColor = "white";
    switchHolder.style.border= "2px solid white";
    document.body.style.backgroundColor = "#1d222f";
    headerContainer.style.backgroundColor = "#262b37"
    navLeftFixed.style.backgroundColor = "#262b37";
    titreUn.style.bac
    toggled = true;
    }else{

    switchButton.style.transition =".4s all ease-in-out";

    headerContainer.style.backgroundColor = "#d6d6d6"
    navLeftFixed.style.backgroundColor = "#707070";

    switchButton.style.transform ="translateX(4px)";
    switchButton.style.backgroundColor = "#f07d2d";
    switchHolder.style.border= "2px solid #f07d2d";
    document.body.style.backgroundColor = "white";
    headerContainer.style.backgroundColor = "white"


    toggled = false;
    }
});

}
*/