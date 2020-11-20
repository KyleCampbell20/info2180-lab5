window.onload = function(){
    var btn = document.getElementById('lookup')
    btn.addEventListener("click", function(e){
        e.preventDefault();
        
        search = document.getElementById('country').value;
        
        var httpRequest = new XMLHttpRequest(); 
        var url = "http://localhost/info2180-lab5/world.php?country="+ search;
        httpRequest.open('GET', url); 
        httpRequest.send();
       
        httpRequest.onreadystatechange = function(){

            if(httpRequest.readyState === XMLHttpRequest.DONE){
                if(httpRequest.status === 200){
                    var response = httpRequest.responseText;
                    document.getElementById('result').innerHTML= response
                }else{
                    alert('There was a problem with the request')
                }
            }
        }
    })
    var cbtn = document.getElementById('cities')
    cbtn.addEventListener("click", function(e){
        e.preventDefault();

        search = document.getElementById('country').value;
        
        var httpRequest1 = new XMLHttpRequest(); 
        var url1 = "http://localhost/info2180-lab5/world.php?country=&context=cities"+ search;
        httpRequest1.open('GET', url1); 
        httpRequest1.send();
       
        httpRequest1.onreadystatechange = function(){

            if(httpRequest1.readyState === XMLHttpRequest.DONE){
                if(httpRequest1.status === 200){
                    var response1 = httpRequest1.responseText;
                    document.getElementById('result').innerHTML= response1
                }else{
                    alert('There was a problem with the request')
                }
            }
        }
    })
}