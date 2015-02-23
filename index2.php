<html>
    <head>
        <script>
        function getNames(u){	
	var rx = new RegExp;
	rx = /[^a-z0-9]/gi;	
	var replaced = u.search(rx) >= 0;
	if(replaced){
    	u = u.replace(rx, "");
		document.getElementById("searchUsername").value = u;
	}	
	if(u == ""){
		document.getElementById("memSearchResults").style.display = "none";
		return false;
	}
    var hr = new XMLHttpRequest();
    hr.open("POST", "search_func.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			if(return_data != ""){	
				document.getElementById("memSearchResults").style.display = "block"; 
				document.getElementById("memSearchResults").innerHTML = return_data;
			}
	    }
    }
    hr.send("u="+u);
}
       function getNames1(u){	
	var rx = new RegExp;
	rx = /[^a-z0-9]/gi;	
	var replaced = u.search(rx) >= 0;
	if(replaced){
    	u = u.replace(rx, "");
		document.getElementById("searchUsername1").value = u;
	}	
	if(u == ""){
		document.getElementById("memSearchResults1").style.display = "none";
		return false;
	}
    var hr = new XMLHttpRequest();
    hr.open("POST", "search_func.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			if(return_data != ""){	
				document.getElementById("memSearchResults1").style.display = "block"; 
				document.getElementById("memSearchResults1").innerHTML = return_data;
			}
	    }
    }
    hr.send("u1="+u);
}
</script>
    </head>
    <body>
        
            
             
                                 
                                      <form name="form" method='post' action='search_func.php'>
                                 <input id="searchUsername" name="u" type="text" autocomplete="off"  placeholder="source" >
                                  
            
                                 <input id="searchUsername1" name="u1" type="text" autocomplete="off"  placeholder="destination " >
                                 <input type="submit" name="form1">
                                      </form>
            
        </form>
    </body>
</html>