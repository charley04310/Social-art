
 // function to set a given theme/color-scheme
        function setTheme(themeName) {
            localStorage.setItem('theme', themeName);
            document.documentElement.className = themeName;
        }

        // function to toggle between light and dark theme
        function toggleTheme() {
            if (localStorage.getItem('theme') === 'theme-light') {
                setTheme('theme-dark');
            } else {
                setTheme('theme-light');
            }
        }

        // Immediately invoked function to set the theme on initial load
        (function () {
            if (localStorage.getItem('theme') === 'theme-dark') {
                setTheme('theme-dark');
                document.getElementById('slider').checked = false;
            } else {
                setTheme('theme-light');
              document.getElementById('slider').checked = true;
            }
        })();



    

function test(){

    var  HtmlPage = document.getElementById('html');
    var ThemeValue = HtmlPage.getAttribute('class');


    if(ThemeValue === 'theme-dark'){

        document.getElementById('slider').checked = true;

    }else{
        document.getElementById('slider').checked = false;
    }
  
  }