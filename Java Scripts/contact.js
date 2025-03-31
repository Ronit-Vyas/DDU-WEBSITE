 
        function show()
        {
            // alert("Hello  help you!!!")
            var myname = document.getElementById("tfname").value
        
            var comm = document.getElementById("comm").value

            if(myname == " ")
                alert("PLEASE ENTER YOUR NAME!!");
            if(comm == " ")
                alert("PLEASE ENTER COMMENTS");
            
            function checkemail()
            {
                var val=document.getElementById("email").value
                var myimg=document.getElementById("imgemail")
                var lbl = document.getElementById("lblemail")
                var pat="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$"
                var reg=new RegExp(pat)
                if(reg.test(val))
                {
                    myimg.src= "images/green.jpg"
                    lbl.innerHTML="VALID EMAIL"
                    lbl.style.color="green"
                }
                else{
                    myimg.src= "images/red.jpg"
                    lbl.innerHTML="PLEASE ENTER VALID EMAIL!!"
                    
                }
            }
         }
    