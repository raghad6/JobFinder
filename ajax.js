function loadXMLDoc()
{
    var xmlhttp;
    if (window.XMLHttpRequest) {   // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    }
    else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("spon").innerHTML= xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "javascript/soponsoredJobs.php", true);
    console.log(xmlhttp);
    xmlhttp.send();
}

setInterval("loadXMLDoc()", 5000);
