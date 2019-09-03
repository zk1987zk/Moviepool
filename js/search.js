function searchwordtest(){

    var str = $("#searchword").val();

    if (str=="")
    {
        document.getElementByClassName("row").innerHTML="";
        return;
    } 
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementByClassName("row").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","search.php?q="+str,true);
    xmlhttp.send();
});