function validate()
           {
               //alert("i have entered ");
               //document.write("helo");
               var a_pass=document.myform.newloginpass.value;
               var a_age=document.myform.newloginage.value;
               var a_mobile=document.myform.newloginmob.value;
               
               if(a_pass.length < 6)
                   {
                       alert("Enter the valid password (atleast 6 digits)");
                       document.myform.newloginpass.focus();
                       return false;
                   }
                if(isNaN(a_age))
                   {
                       alert("Enter your valid age");
                       document.myform.newloginage.focus();
                       return false;
                   }
                   if(a_age<5)
                   {
                       {
                       alert("Enter your valid age");
                       document.myform.newloginage.focus();
                       return false;
                   }
                   }
                   if(a_age>99)
                   {
                       {
                       alert("Enter your valid age");
                       document.myform.newloginage.focus();
                       return false;
                   }
                   }
                   
                       
               if(isNaN(a_mobile))
                   {
                       alert("Enter the valid mobile");
                       document.myform.newloginmob.focus();
                       return false;
                   }
                    if(a_mobile.length !=10)
                   {
                       alert("Enter the valid mobile");
                       document.myform.newloginmob.focus();
                       return false;
                   }
               return true;
               
           }
          


