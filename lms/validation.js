
function validate()
{
    var password1 = document.getElementById('passwd1').value;
    var password2 = document.getElementById('passwd2').value;

    if(password1 === password2)
    {
        passwd1.style.border="solid 2px green";
        passwd2.style.border="solid 2px green";
        return true;

    }

    else
    {
        passwd1.style.border="solid 2px red";
        document.getElementById('label1').style.visibility="visible";
        passwd2.style.border="solid 2px red";
        document.getElementById('label2').style.visibility="visible";
        return false;
    }

}