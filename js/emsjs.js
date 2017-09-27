//=================TYPEWRITER=============

var i = 0;
var txt = 'Upcoming Events...';
var speed = 200;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}


//==================MODAL===============


// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("btn");

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

// ========= Scroll to Top =============== 

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


//================= SLIDER ==========================

(function() {
  
  function Slideshow( element ) {
    this.el = document.querySelector( element );
    this.init();
  }
  
  Slideshow.prototype = {
    init: function() {
      this.wrapper = this.el.querySelector( ".slider-wrapper" );
      this.slides = this.el.querySelectorAll( ".slide" );
      this.previous = this.el.querySelector( ".slider-previous" );
      this.next = this.el.querySelector( ".slider-next" );
      this.index = 0;
      this.total = this.slides.length;
      this.timer = null;
      
      this.action();
      this.stopStart(); 
    },
    _slideTo: function( slide ) {
      var currentSlide = this.slides[slide];
      currentSlide.style.opacity = 1;
      
      for( var i = 0; i < this.slides.length; i++ ) {
        var slide = this.slides[i];
        if( slide !== currentSlide ) {
          slide.style.opacity = 0;
        }
      }
    },
    action: function() {
      var self = this;
      self.timer = setInterval(function() {
        self.index++;
        if( self.index == self.slides.length ) {
          self.index = 0;
        }
        self._slideTo( self.index );
        
      }, 3000);
    },
    stopStart: function() {
      var self = this;
      self.el.addEventListener( "mouseover", function() {
        clearInterval( self.timer );
        self.timer = null;
        
      }, false);
      self.el.addEventListener( "mouseout", function() {
        self.action();
        
      }, false);
    }
    
    
  };
  
  document.addEventListener( "DOMContentLoaded", function() {
    
    var slider = new Slideshow( "#main-slider" );
    
  });
  
})();

//======== END ===========