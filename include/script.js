$(document).ready( function ()
{
  
 $('.Usubmit').on('click', function () {
           checkSettings(); // Check Input Fields
  }); 
  
//=============================================================================

//============================================================================== 
});
//==========================================================
function checkSettings() {

			var fname=$('.Fname').val();
			var lname=$('.Lname').val();
			var email=$('.Email').val();
			var pass=$('.Password').val();
			//alert(fname);
			if(fname && lname && email && pass)
			{
				
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var valid = regex.test(email);
                if (!valid) {
                    alert("please enter valid mail");
				}					
            else {
				$.getJSON("C:/wamp/www/PHP Interview Task/Task_1_2/IDDO-pack/web/include/class.signup.php", {method: "insert", Fname: fname , Lname: lname , Email: email , Pass: pass})
                    .done(function (data) {
                        //if(data["OK"]) {
    					    alert(" you have register successful ");
    					//} else {
							//alert(data["Error"]);
    					//}
					});
                }
//=======================================================================================================================
			}
//=======================================================================================================================
			else {
                //$('.SettingsInput2').attr('style', 'border: 1px solid red !important');
				alert('you must fill all field  ');
            } 
		}
