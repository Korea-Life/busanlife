
	
if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) { 
    var viewportmeta = document.querySelector('meta[name="viewport"]'); 

    if (viewportmeta) { 
        viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0'; 
  
        document.body.addEventListener('gesturestart', 
        function () { 
            viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6'; 
        }, false); 
    } 
}  
        function launchMenu(){ 
            var mobileNav = document.getElementById('mobile-nav'); 
            var navSwitch = document.getElementById('nav-switch');  
            
            if (mobileNav.offsetHeight <= 0) { 
                mobileNav.style.display = "block"; 
                navSwitch.innerHTML = "<div class='menu-button'><span></span><span></span><span></span></div>"; 
                navSwitch.style.borderTop = "2px solid #ddd"; 
            } else { 
                mobileNav.style.display = "none"; navSwitch.innerHTML = "<div class='menu-button'><span></span><span></span><span></span></div>"; navSwitch.style.border = "0";
                } 
         }
