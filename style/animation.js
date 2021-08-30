
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function DropDownMenu(html){
  var rubrique = document.getElementById("myDropdown_rubr");
  var menu = document.getElementById("myDropdown");

  if(menu.classList.contains("show") == true){
   menu.classList.remove("show");
  }

  if(rubrique.classList.contains("show") == true){
      rubrique.classList.remove("show");
   }

document.getElementById(html).classList.toggle("show");

  
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.drop_btn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



function SetModal(){

    var modal = document.querySelector("#myModal");
    
    modal.classList.add("show-modal");
    // Get the button that opens the modal    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
  
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.classList.remove("show-modal");   
    
    }
    
    
}


function ModalAddArticle(){

    var modal = document.querySelector("#AddArticle");
    
    // Get the button that opens the modal
    modal.classList.add("show-AddPost");
    
    // Get the <span> element that closes the modal
    var span = document.getElementById("close_add");
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.classList.remove("show-AddPost");  
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.classList.remove("show-AddPost");  
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







/*function darkMode(){

var welcoming = document.getElementById("container-welcoming");

let root = document.documentElement;
  var toggled =false;
  var switchHolder = document.getElementById("outer-div");
  var switchButton = document.getElementById("inner-div");

switchButton.addEventListener('click',function () {
  if(!toggled){
  switchButton.style.transition =".4s all ease-in-out";
  switchButton.style.transform ="translateX(25px)";
  switchButton.style.backgroundColor = "white";
  switchHolder.style.border= "1px solid white";
  root.style.setProperty('--main-header-color', '#BFBFBF');
  root.style.setProperty('--main-menu-color', 'linear-gradient(180deg, rgba(191,191,191,1) 0%, rgba(191,191,191,1) 20%, rgba(191,191,191,0.7791491596638656) 46%, rgba(191,191,191,0.3897934173669467) 100%)');

  welcoming.style.backgroundImage = "url('img/social_coverlight.png')"
  

  toggled = true;
  }else{

  root.style.setProperty('--main-header-color', '#19191a');
  root.style.setProperty('--main-menu-color', 'linear-gradient(180deg, rgba(20,20,20,1) 0%, rgba(20,20,20,1) 20%, rgba(20,20,20,0.9528186274509804) 37%, rgba(22,22,22,0.7819502801120448) 76%, rgba(25,25,26,0.5242471988795518) 100%)');



  switchButton.style.transition =".4s all ease-in-out";
  switchButton.style.transform ="translateX(4px)";
  switchButton.style.backgroundColor = "#f07d2d";
  switchHolder.style.border= "1px solid #f07d2d";
  


  welcoming.style.backgroundImage = "url('img/social_covertest.png')"




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