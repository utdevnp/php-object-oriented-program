// JavaScript Document
function validate_text_length(field_id,place_id,min_length,max_length,is_required)
{
	data=document.getElementById(field_id).value;
	var msg="";
	
	if( (is_required=='N') && (data.length==0) )
	{
		msg="&radic;";
		 document.getElementById(place_id).innerHTML=msg;
		 document.getElementById(place_id).style.color="#33CC00";
		 document.getElementById(field_id).style.backgroundColor="#D9FFD9";
		 return 'T';		
	}
	else if	(is_required=='Y' && (data.length==0) )
	{
		msg="*";
		 document.getElementById(place_id).innerHTML=msg;
		 document.getElementById(place_id).style.color="#F00";
		 document.getElementById(field_id).style.backgroundColor="#F77";		 
		 return 'F';		
	}
	else if((data.length<min_length || data.length>max_length))
	{
		msg="<small>Min. "+ min_length + " Max. " + max_length + "</small>";
		 document.getElementById(place_id).innerHTML=msg;
		 document.getElementById(place_id).style.color="#F00";
		 document.getElementById(field_id).style.backgroundColor="#F77";		 
		 return 'F';		
	}
	else
	{
		 document.getElementById(place_id).innerHTML="&radic;";
		 document.getElementById(place_id).style.color="#33CC00";
		 document.getElementById(field_id).style.backgroundColor="#D9FFD9";
		 return 'T';		
	}
}


function validate_numeric_range(field_id,place_id,min_val,max_val)
{
	data=document.getElementById(field_id).value;
	var msg="";	
	if(isNaN(data))
	{
		 msg="<small>Invalid</small>";
		 document.getElementById(place_id).innerHTML=msg;
		 document.getElementById(place_id).style.color="#F00";
		 document.getElementById(field_id).style.backgroundColor="#F77";		 
		 return 'F';	
	}
	else if( data<min_val || data>max_val) 
	{	msg="<small>Min. "+min_val + " Max. " + max_val + "</small>";
		document.getElementById(place_id).innerHTML = msg;
 		document.getElementById(field_id).style.backgroundColor="#F77";		
		document.getElementById(place_id).style.color="#F00";		
		return 'F';
	}
	else
	{
		 document.getElementById(place_id).innerHTML="&radic;";
		 document.getElementById(place_id).style.color="#33CC00";
		 document.getElementById(field_id).style.backgroundColor="#D9FFD9";			 
		 return 'T';
	}	
}


function validate_integer(field_id,place_id)
{
	data=document.getElementById(field_id).value;
	var msg="";	
	if(isNaN(data))
	{
		 msg="<small>Invalid</small>";
		 document.getElementById(place_id).innerHTML=msg;
		 document.getElementById(place_id).style.color="#F00";
 		 document.getElementById(field_id).style.backgroundColor="#F77";	
		 return 'F';	
	}
	else
	{
		 document.getElementById(place_id).innerHTML="&radic;";
		 document.getElementById(place_id).style.color="#33CC00";
 		 document.getElementById(field_id).style.backgroundColor="#D9FFD9";			 
		 return 'T';		
	}
}



function validate_email(field_id,place_id,is_required)
{
	var email=document.getElementById(field_id).value;
	var illegal=/^[\w\-\+\.]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
    if(email.length==0)
	{
	    document.getElementById(place_id).innerHTML="*";
		document.getElementById(place_id).style.color="#F00";
 		 document.getElementById(field_id).style.backgroundColor="#F77";			
		return 'F';
	}
	else if(!(email.match(illegal)))
	{
		document.getElementById(place_id).innerHTML="<small>Invalid</small>";
		document.getElementById(place_id).style.color="#F00";
		document.getElementById(field_id).style.backgroundColor="#F77";	
		return 'F';
	}
	else
	{
		document.getElementById(place_id).innerHTML="&radic;";
		document.getElementById(place_id).style.color="#33CC00";
		document.getElementById(field_id).style.backgroundColor="#D9FFD9";	
		return 'T';
	}
}



function validate_file(field_id,place_id,is_required) {
	var data = document.getElementById(field_id).value;
	var msg="";
	if( (is_required=='N') && (data.length==0) )
	{
		msg='&radic;';
		document.getElementById(place_id).innerHTML=msg;
		document.getElementById(place_id).style.color="#33CC00";
		document.getElementById(field_ID).style.backgroundColor="#D9FFD9";		
		return 'T';
	}
	else if( (is_required=='Y') &&  (data.length==0) )
	{
		msg = "<small>No File</small>";
		document.getElementById(place_id).innerHTML=msg;
		document.getElementById(place_id).style.color="#F00";
		document.getElementById(field_ID).style.backgroundColor="#F77";					
		return 'F';
	}
    else if(!/(\.bmp|\.gif|\.jpg|\.jpeg)$/i.test(data.toLowerCase())) 
    {
        msg = "<small>Invalid</small>";
		document.getElementById(place_id).innerHTML=msg;
		document.getElementById(place_id).style.color="#F00";
		document.getElementById(field_ID).style.backgroundColor="#F77";			
        return 'F';   
    }
	else
	{
		msg = "&radic;";
		document.getElementById(place_id).innerHTML=msg;
		document.getElementById(place_id).innerHTML="&radic;";
		document.getElementById(place_id).style.color="#33CC00";
		document.getElementById(field_ID).style.backgroundColor="#D9FFD9";					
		return 'T'; 
	}
 } 
 
 
 
 function validate_url(field_id,place_id) {
        var url = document.getElementById(field_id).value;
        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        var msg="";
		if(url.length==0)
		{
			document.getElementById(place_id).innerHTML="&radic;";
			document.getElementById(place_id).style.color="#33CC00";
			document.getElementById(field_ID).style.backgroundColor="#D9FFD9";			
			return 'T';
		}
		else if (!(pattern.test(url))) 
		{
			document.getElementById(place_id).innerHTML="<small>Invalid</small>";
			document.getElementById(place_id).style.color="#F00";
			document.getElementById(field_ID).style.backgroundColor="#F77";
			return 'F';
        }
		else
		{
			document.getElementById(place_id).innerHTML="&radic;";
			document.getElementById(place_id).style.color="#33CC00";
			document.getElementById(field_ID).style.backgroundColor="#D9FFD9";			
			return 'T';		
		}
    }

function v_doe_en()
{
	data=document.getElementById('doe_en').value;
	var d = new Date();
	var msg="";
	if(data.length==0)
	{
		msg="*";
	}
	else if(isNaN(data))
	{
		msg="Numbers Only";
	}
	else if((data<1900 || data>(d.getFullYear()) ))
	{
		msg="<small>Min. 1900, Max. "+ d.getFullYear()+"</small>";
	}
	 if(msg=="")
	 {
		 document.getElementById("msg_doe_en").innerHTML="&radic;";
		 document.getElementById("msg_doe_en").style.color="#33CC00";
		 document.getElementById('msg_doe_en').style.backgroundColor="#D9FFD9";
		 
		 return 'F';
	 }
	 else
	 {
		 document.getElementById("msg_doe_en").innerHTML=msg;
		 document.getElementById("msg_doe_en").style.color="#F00";
		 document.getElementById('msg_doe_en').style.backgroundColor="#F77";
		 return 'F';
	 }
}

function validate_password(field_id,place_id,min_length,max_length,is_required)
{
	var data = document.getElementById(field_id).value;
	var a=/[W_]/;
	   if(data.length==0)
		{
			document.getElementById(place_id).innerHTML="*"
			document.getElementById(place_id).style.color="#F00";
			 document.getElementById(field_id).style.backgroundColor="#F77";
			return false;
		}
		else if((data.length<min_length) || (data.length>max_length))
		{
			document.getElementById(place_id).innerHTML="<small>Min. 6, Max. 150</small>";			
			document.getElementById(place_id).style.color="#F00";
			document.getElementById(field_id).style.backgroundColor="#F77";
			return false;
		}
	
		else if(a.test(data))
		{
			document.getElementById("password_msg").innerHTML="<small>Enter valid password.</small>";
			document.getElementById("password_msg").style.color="#F00";
			document.getElementById(field_id).style.backgroundColor="#F77";
			return false;
		}
		else if(!((data.search(/[a-z]+/)>-1) && (data.search(/[A-Z]+/)>-1) && (data.search(/[0-9]+/)>-1)))
		{
			document.getElementById("password_msg").innerHTML="<small>Atleast 1 Digit, 1 Uppercase,1 Lowercase</small>";
			document.getElementById("password_msg").style.color="#F00";
			document.getElementById(field_id).style.backgroundColor="#F77";
			return false;
		}
		else
		{

			document.getElementById("password_msg").innerHTML="&radic;";
			document.getElementById("password_msg").style.color="#33CC00";
			return true;
		}
}
function validate_retype_password(field_id,place_id)
{
	var r=document.getElementById(field_id).value;
	if(r.length==0)
	{
		document.getElementById("msg_retype_password").value="*";
		document.getElementById("msg_retype_password").style.color="#F00";
		document.getElementById(field_id).style.backgroundColor="#F77";
		return false;
	}
	else if(document.getElementById('password').value!=document.getElementById('retype_password').value)
	{
		document.getElementById("msg_retype_password").innerHTML="<small>Password mismatch.</small>";
		document.getElementById("msg_retype_password").style.color="#F00";
		document.getElementById(field_id).style.backgroundColor="#F77";
		return false;
	}
	else
	{
		document.getElementById("msg_retype_password").innerHTML="&radic;";
		document.getElementById("msg_retype_password").style.color="#33CC00";
		return true;
	}
}

function validate_fixed_size_int(field_id,place_id,size)
{
	data=document.getElementById(field_id).value;
	var msg="";	
	var pattern=/^[0-9]{size}$/;
	if(isNaN(data))
	{
		 msg="<small>Numbers Only</small>";
		 document.getElementById(place_id).innerHTML=msg;
		 document.getElementById(place_id).style.color="#F00"
		 document.getElementById(field_id).style.backgroundColor="#F77";
		 return 'F';	
	}
	else if(pattern.test(data)==false) 
	{	msg="<small>Enter "+size+" digits</small>";
		document.getElementById(place_id).innerHTML = msg;
		 document.getElementById(place_id).style.color="#F00";
		 document.getElementById(field_id).style.backgroundColor="#F77";		 		
		return 'F';
	}
	else
	{
		 document.getElementById(place_id).innerHTML="&radic;";
		 document.getElementById(place_id).style.color="#33CC00";
		 document.getElementById(field_id).style.backgroundColor="#D9FFD9";
		 return 'T';
	}		
}