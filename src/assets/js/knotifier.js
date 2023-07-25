//built and designed from scratch with love by kayode shobalaje
        
    var knotifier = {
      success: function(msg) {
        var div = document.createElement("div");
          
          div.innerHTML = '<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="la la-close bsm"></i></a>'+msg;

          div.setAttribute("class","alert alert-not-success alert-notify alert-dismissible slideInDown animated");
        document.body.appendChild(div);  
          x.close(div);
      },
      error: function(msg) {
        var div = document.createElement("div");
          
        div.innerHTML = '<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="la la-close bsm"></i></a>'+msg;
          
          div.setAttribute("class","alert alert-not-danger alert-notify alert-dismissible slideInDown animated");
        document.body.appendChild(div); 
          x.close(div);
      },
      info: function(msg) {
        var div = document.createElement("div");
          
        div.innerHTML = '<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="la la-close bsm"></i></a>'+msg;
          
          div.setAttribute("class","alert alert-not-info alert-notify alert-dismissible slideInDown animated");
        document.body.appendChild(div);
          x.close(div);
      }
    }
    
    var x = {
        close: function(div) {
        
          setTimeout(function(){
              div.removeAttribute("class","slideInDown animated");
              div.setAttribute("class","fadeOutLeftBig animated"); 
              document.body.removeChild(div); 
          },5000);
      }
    }