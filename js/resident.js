var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("newsSlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}



function myFunction(hidedocument) {
    var x = document.getElementById(hidedocument);
        if (x.className.indexOf("document-show") == -1) {
        x.className += " document-show";
        } else { 
            x.className = x.className.replace(" document-show", "");
        }
    }
function myFunction(hidedocument1) {
    var x = document.getElementById(hidedocument1);
        if (x.className.indexOf("document-show") == -1) {
        x.className += " document-show";
        } else { 
            x.className = x.className.replace(" document-show", "");
        }
    }
function myFunction(hidedocument2) {
    var x = document.getElementById(hidedocument2);
        if (x.className.indexOf("document-show") == -1) {
        x.className += " document-show";
        } else { 
            x.className = x.className.replace(" document-show", "");
        }
    }
function myFunction(hidedocument3) {
    var x = document.getElementById(hidedocument3);
        if (x.className.indexOf("document-show") == -1) {
        x.className += " document-show";
        } else { 
            x.className = x.className.replace(" document-show", "");
        }
    }
function myFunction(hidedocument4) {
        var x = document.getElementById(hidedocument4);
            if (x.className.indexOf("document-show") == -1) {
            x.className += " document-show";
            } else { 
                x.className = x.className.replace(" document-show", "");
            }
        }

    let date_issue = new Date().toISOString().param(0,10);
		document.querySelector("#date_issue").value = date_issue;


       

    
    