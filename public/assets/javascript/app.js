document.getElementById("myForm").addEventListener("submit", myfunc);

function myfunc(){
    
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let input = document.getElementById("message").value;
            document.getElementById("messages").innerHTML = input;

        }
       
    }
    xml.open(
        "POST",
        "/",
        true
    );  
    xml.send();
}