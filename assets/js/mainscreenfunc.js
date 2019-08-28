 function valueChanged(){
    if (document.getElementById('advancecheck').checked) 
        {document.getElementById("subnetmaskdiv").style.display = 'block';
    }
    else
        document.getElementById("subnetmaskdiv").style.display = 'none';
    }
	function uploadimg()
	{
	 if (document.getElementById('image').checked) 
        {document.getElementById("upload").style.display = 'block';
    }
    else
        document.getElementById("upload").style.display = 'none';
    }
    
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;

}

// Get the element with id="defaultOpen" and click on it
function getDefault(){
    document.getElementById("defaultOpen").click();
}

function printMessage()
{
	document.getElementById("demo").innerHTML = "New Essay is successfully added";

}