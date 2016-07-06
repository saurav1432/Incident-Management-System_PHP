/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function validate()
{
    var cat=document.myform.makercategory.value;
    if(cat == ("CATEGORY"))
    {
        alert("Category should not be empty ");
        document.myform.makercategory.focus();
        return false;
    }
    return true;
}               
function myFunction() 
{
    document.getElementById("myDropdown").classList.toggle("show");
}
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) 
    {   
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) 
        {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) 
            {
                openDropdown.classList.remove('show');
            }
        }
    }
}