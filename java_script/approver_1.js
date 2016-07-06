/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function validate()
{
    var user=document.myform.list_username.value;
    var cat=document.myform.list_category.value;
    var status=document.myform.list_status.value;
    if(user == ("USERNAME"))
    {
        alert("Username should not be empty ");
        document.myform.list_username.focus();
        return false;
    }
    if(cat == ("CATEGORY"))
    {
        alert("Category should not be empty ");
        document.myform.list_category.focus();
        return false;
    }
    if(status == ("STATUS"))
    {
         alert("Status should not be empty ");
         document.myform.list_status.focus();
         return false;
    }   
    return true;
}
function myFunction() 
{
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) 
{
    if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}