                                                $(document).ready(function () { //if this page is load to browser then execute this code(call back functions)
                                                $('form').submit(function () { // this is happenning when submit button is clicked

                                                    var user_fname = $('#user_fname').val(); //val is use to getting value of inside element 
                                                    var user_lname = $('#user_lname').val(); //get the value of the input feild with the id $user_lname
                                                    var user_dob = $('#user_dob').val();     //get the value of the input feild with the id $user_dob
                                                    var user_email = $('#user_email').val();  //get the value of the input feild with the id $user_email
                                                    var hid = $('#hid').val();
                                                    var user_tel = $('#user_tel').val();   //get the value of the input feild with the id $user_tel
                                                    var user_nic = $('#user_nic').val();   //get the value of the input feild with the id $user_nic
                                                    var pro_id = $('#pro_id').val();    //get the value of the input feild with the id $pro_id
                                                    var dis_id = $('#dis_id').val();    //get the value of the input feild with the id $dis_id
                                                    var role_id = $('#role_id').val();  //get the value of the input feild with the id $role_id
                                                    var user_image = $("#user_image").val(); //get the value of the input feild with the id $user_image
                                                    

                                                    var pattel = /^\+94[0-9]{9}$/;//reguler expression
                                                    var pattel1 = /^[0][0-9]{9}$/;
                                                    var patnic = /^[0-9]{9}[vVxX]$/;
                                                    var patnic1 = /^[0-9]{12}$/;


                                                    if (user_fname == "") {
                                                        $('#uferror').text("Empty first name"); //if fname is empty then do this
                                                        $('#user_fname').css('border-color', "red");
                                                        $('#user_fname').focus();  //focus the pointer to the relevent input feild
                                                        return false;// is yes then dont go to server
                                                    }
                                                      


                                                    if (user_lname == "") {               //if lname is empty then do this
                                                        $('#ulerror').text("Empty last name");
                                                        $('#user_lname').css('border-color', "red");
                                                        $('#user_lname').focus();  //focus the pointer to the relevent input feild
                                                        return false;
                                                    }

                                                    if (user_dob != "") {        //if the user_dob is not empty
                                                        
                                                        var current = new Date();  //to get current year
                                                        var cyear = current.getFullYear();//for get current year                                                        
                                                        var cmonth = current.getMonth();  //get current month
                                                        var cdate = current.getDate();   //get current date


                                                        var dob = new Date(user_dob);  //get the user dob
                                                        var byear = dob.getFullYear();  //get the dob year
                                                        var bmonth = dob.getMonth();   //get the month
                                                        var bdate = dob.getDate();  //get the date

                                                        var age = cyear - byear; //age equals to current year - birth year
                                                        var m = cmonth - bmonth; //months equals to current month-birth month
                                                        var d = cdate - bdate;   //day equals to current date- birth date

                                                        if (m < 0 || (m == 0 && d < 0)) {
                                                            age--;
                                                        }

                                                        var error = "";
                                                        var status = 0; //if age is less than 18 show error message under age
                                                        if (age < 18) {   
                                                            error = "Underage"; 
                                                            status = 1;
                                                        } else if (age > 60) {
                                                            error = "Overage";
                                                            status = 1;
                                                        } else {
                                                            status = 0;
                                                            $('#udoberror').text("");
                                                        }

                                                        if (status == 1) {
                                                            $('#udoberror').text(error);
                                                            $('#user_dob').focus();
                                                            return false;
                                                        }
                                                    }


                                                    if ($('input[name=user_gender]:checked').length <= 0) {
                                                        $('#ugerror').text("Select a gender");
                                                        $('#male').focus();
                                                        return false;
                                                    }


                                                    if (user_email == "") {
                                                        $('#ueerror').text("Empty Email");
                                                        $('#user_email').css('border-color', "red");
                                                        $('#user_email').focus();
                                                        return false;// i
                                                    }

                                                    if (hid == 1) {
                                                        $('#user_email').focus();
                                                        $('#user_email').select();
                                                        return false;
                                                    }

                                                    if (user_tel != "") {
                                                        if (!(user_tel.match(pattel)) && !(user_tel.match(pattel1))) {
                                                            $('#uterror').text("Invalid telephone");
                                                            $('#user_tel').css('border-color', "red");
                                                            $('#user_tel').select();
                                                            return false;
                                                        }
                                                    }

                                                    if (user_nic != "") {
                                                        if (!(user_nic.match(patnic)) && !(user_nic.match(patnic1))) {
                                                            $('#unerror').text("Invalid NIC");
                                                            $('#user_nic').css('border-color', "red");
                                                            $('#user_nic').select();
                                                            return false;
                                                        }
                                                    }

                                                    if (user_dob != "" && user_nic != "") {
                                                        var len = user_nic.length;
                                                        if (len == 10) {
                                                            var snic = user_nic.substring(0, 2);// sub string (startingpoint,length)
                                                            var sdob = byear.toString().substr(2, 2);
                                                            if (snic != sdob) {
                                                                $("#unerror").text("Plese check dob and nic");
                                                                return false;
                                                            }
                                                        }
                                                        if (len == 12) {
                                                            var snic = user_nic.substring(0, 4);// sub string (startingpoint,length)
                                                            var sdob = byear;
                                                            if (snic != sdob) {
                                                                $("#unerror").text("Plese check dob and nic");
                                                                return false;
                                                            }
                                                        }
                                                    }


                                                    if (user_image != "") {
                                                        var arr = user_image.split("."); //split user image using dot(.).ex:bit.sem6.jpg is split to 3 values. 
                                                        var l = arr.length - 1;
                                                        var ext = arr[l].toLowerCase();
                                                        var extarr = ['jpg', 'jpeg', 'gif', 'png', 'tiff', 'svg'];
                                                        if ($.inArray(ext, extarr) == -1) {//check that ext variable is included in extarr array.if included then position 
                                                                                            //is display .if not -1 will display.
                                                            $("#uierror").text("Invalid image format");
                                                        }
                                                    }


                                                    if (pro_id == "") {
                                                        $('#uperror').text("Select a province");
                                                        $('#pro_id').css('border-color', "red");
                                                        $('#pro_id').focus();
                                                        return false;// i
                                                    }

                                                    if (dis_id == "") {
                                                        $('#uderror').text("Select a District");
                                                        $('#dis_id').css('border-color', "red");
                                                        $('#dis_id').focus();
                                                        return false;// i
                                                    }

                                                    if (role_id == "") {
                                                        $('#urerror').text("Select a role");
                                                        $('#role_id').css('border-color', "red");
                                                        $('#role_id').focus();
                                                        return false;// i
                                                    }


                                                });


                                                $('#user_fname').keypress(function () {
                                                    $('#uferror').text("");//to delete error message after enter a text
                                                });
                                                $('#user_lname').keypress(function () {
                                                    $('#ulerror').text("");//to delete error message after enter a text 
                                                });

                                                $('input[name=user_gender]').click(function () {
                                                    $('#ugerror').text("");
                                                });

                                                $('#user_email').keypress(function () {
                                                    $('#ueerror').text("");//to delete error message after enter a text 
                                                });

                                                $('#user_tel').keypress(function () {
                                                    $('#uterror').text("");//to delete error message after enter a text 
                                                });

                                                $('#user_nic').keypress(function () {
                                                    $('#unerror').text("");//to delete error message after enter a text 
                                                });

                                                $('#pro_id').change(function () {
                                                    $('#uperror').text("");//to delete error message after select a district 
                                                });

                                                $('#dis_id').change(function () {
                                                    $('#uderror').text("");//to delete error message after select a district 
                                                });


                                                $('#role_id').change(function () {
                                                    $('#urerror').text("");//to delete error message after select a district 
                                                });










                                            });

                                            function readURL(input) {// to display selected image in when selected .input is a name
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#img_view')
                                                                .attr('src', e.target.result)
                                                                .height(70);
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }

                                            //To check email
                                            function checkEmail(str) {
                                                $('#ueerror').text('');
                                                $('ueerror').removeClass('alert-danger');//we can remove css class using remove class
                                                var xhttp;
                                                if (str == "") {
                                                    document.getElementById("showEmail").innerHTML = "";
                                                    return;
                                                }
                                                xhttp = new XMLHttpRequest(); // get request using javascript start from here (0)
                                                xhttp.onreadystatechange = function () {
                                                    // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';(3)
                                                    if (this.readyState == 4 && this.status == 200) {//4 is for server giv reply. 200 is for successfull
                                                        document.getElementById("showEmail").innerHTML = this.responseText;  //get responce and show that imail in 
                                                                                                                            //showemail span

                                                    }
                                                };
                                                xhttp.open("GET", "../ajax/getEmail.php?q=" + str, true); //send str and get requst from getemail.true is 
                                                                                                          //for expecting respond.if there is false not expecting respond. (1)
                                                xhttp.send();// after send xhttp.onreadystatechange = function () { is execute(2)
                                            }
