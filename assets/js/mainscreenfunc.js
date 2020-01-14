function bufferTime(){
    if (document.getElementById('buffercheck').checked) 
        {document.getElementById("buffer_time").style.display = 'block';
    }
    else
        document.getElementById("buffer_time").style.display = 'none';
    }
function logOut(){
        window.location.href='index.php';
    }
	
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
function change() // no ';' here
{
    var elem = document.getElementById("myButton1");
    if (elem.value=="START ACTIVITY") elem.value = "STOP ACTIVITY";
    else elem.value = "START ACTIVITY";
}
function printMessage()
{
	document.getElementById("demo").innerHTML = "New Essay is successfully added";

}
function changeStatus()
{
	var changestatus = document.getElementById("changeButton");
	if(changestatus.value == "START ACTIVITY") 
		changestatus.value = "stop Activity";
	else
		changestatus.value = "start Activity";
}
