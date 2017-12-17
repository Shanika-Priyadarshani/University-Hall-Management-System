
var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value ) {
            document.getElementById('message').innerHTML = '';
            document.getElementById('message1').innerHTML ='';
            if(check_length(6)){
                document.getElementById("submit_btn").disabled = false;
            }
            else{
                document.getElementById('message1').style.color = 'red';
                document.getElementById('message1').innerHTML = 'Password should contain minimum 6 characters'
                document.getElementById("submit_btn").disabled = true;
            }

        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Not matching with Password';
            document.getElementById("submit_btn").disabled = true;
        }
    }

var check_length=function(len){
    if(document.getElementById('password').value.length>=len){
        return true;
    }
    else{
        return false;
    }
}

var check_tel =function () {
    if ((/^\d+$/.test(document.getElementById(contact_number1).value))&& check_length(9)){
        document.getElementById('message2').innerHTML = '';
    }
    else
    {
        document.getElementById('message2').style.color = 'red';
        document.getElementById('message2').innerHTML = 'Enter Valid Contact Numbers'

    }
}

