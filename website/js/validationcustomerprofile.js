$(document).ready(function () { //if this page is load to browser then execute this code(call back functions)
                                                $('form').submit(function () { // this is happenning when submit button is clicked

                                                    var cus_fname = $('#cus_fname').val(); //val is use to getting value of inside eliment 
                                                    var cus_lname = $('#cus_lname').val();
                                                    var cus_dob = $('#cus_dob').val();
                                                    var cus_email = $('#cus_email').val();
                                                    var hid = $('#hid').val();
                                                    
                                                    var cus_tel = $('#cus_tel').val();
                                                    var cus_nic = $('#cus_nic').val();
                                                    var pro_id = $('#pro_id').val();
                                                    var dis_id = $('#dis_id').val();
                                                    var city_id = $('#city_id').val();
                                                    var zip_code = $("#zip_code").val();
                                                    var cus_add = $("#cus_add").val();
                                                    var cus_image = $("#cus_image").val();
                                                    
                                                    var pattel = /^\+94[0-9]{9}$/;//reguler expression
                                                    var pattel1 = /^[0][0-9]{9}$/;
                                                    var patnic = /^[0-9]{9}[vVxX]$/;
                                                    var patnic1 = /^[0-9]{12}$/;

                                                    if (cus_fname == "") {
                                                        $('#uferror').text("Empty first name"); //if fname is empty then do this
                                                        $('#cus_fname').css('border-color', "red");
                                                        $('#cus_fname').focus();
                                                        return false;// is yes then dont go to server
                                                    }
                                                    
                                                    if (cus_lname == "") {
                                                        $('#ulerror').text("Empty last name");
                                                        $('#cus_lname').css('border-color', "red");
                                                        $('#cus_lname').focus();
                                                        return false;
                                                    }

                                                      if ($('input[name=cus_gender]:checked').length <= 0) {
                                                        $('#ugerror').text("Select a gender");
                                                        $('#male').focus();
                                                        return false;
                                                    }

                                              

                                                    if (cus_dob != "") {
                                                        //to get current year
                                                        var current = new Date();
                                                        var cyear = current.getFullYear();//for get current year                                                        
                                                        var cmonth = current.getMonth();
                                                        var cdate = current.getDate();


                                                        var dob = new Date(cus_dob);
                                                        var byear = dob.getFullYear();
                                                        var bmonth = dob.getMonth();
                                                        var bdate = dob.getDate();

                                                        var age = cyear - byear;
                                                        var m = cmonth - bmonth;
                                                        var d = cdate - bdate;

                                                        if (m < 0 || (m == 0 && d < 0)) {
                                                            age--;
                                                        }

                                                        var error = "";
                                                        var status = 0;
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
                                                            $('#cus_dob').focus();
                                                            return false;
                                                        }
                                                    }

                                                        if (cus_nic != "") {
                                                        if (!(cus_nic.match(patnic)) && !(cus_nic.match(patnic1))) {
                                                            $('#unerror').text("Invalid NIC");
                                                            $('#cus_nic').css('border-color', "red");
                                                            $('#cus_nic').select();
                                                            return false;
                                                        }
                                                    }
                                                          if (cus_dob != "" && cus_nic != "") {
                                                        var len = cus_nic.length;
                                                        if (len == 10) {
                                                            var snic = cus_nic.substring(0, 2);// sub string (startingpoint,length)
                                                            var sdob = byear.toString().substr(2, 2);
                                                            if (snic != sdob) {
                                                                $("#unerror").text("Plese check dob and nic");
                                                                return false;
                                                            }
                                                        }
                                                        if (len == 12) {
                                                            var snic = cus_nic.substring(0, 4);// sub string (startingpoint,length)
                                                            var sdob = byear;
                                                            if (snic != sdob) {
                                                                $("#unerror").text("Plese check dob and nic");
                                                                return false;
                                                            }
                                                        }
                                                    }


                                                    if (cus_email == "") {
                                                        $('#ueerror').text("Empty Email");
                                                        $('#cus_email').css('border-color', "red");
                                                        $('#cus_email').focus();
                                                        return false;// i
                                                    }
                                                    if (hid == 1) {
                                                        $('#cus_email').focus();
                                                        $('#cus_email').select();
                                                        return false;
                                                    }
                                               
                                                    
                                                

                                                    if (cus_add == "") {
                                                        $('#uaderror').text("Enter Your Address");
                                                        $('#cus_add').css('border-color', "red");
                                                        $('#cus_add').focus();
                                                        return false;
                                                    }
                                                    if (pro_id == "") {
                                                        $('#uperror').text("Select a Provice");
                                                        $('#pro_id').css('border-color', "red");
                                                        $('#pro_id').focus();
                                                        return false;
                                                    }
                                                    if (dis_id == "") {
                                                        $('#uderror').text("Select a District");
                                                        $('#dis_id').css('border-color', "red");
                                                        $('#dis_id').focus();
                                                        return false;
                                                    }

                                                    if (city_id == "") {
                                                        $('#ucerror').text("Select a City");
                                                        $('#city_id').css('border-color', "red");
                                                        $('#city_id').focus();
                                                        return false;
                                                    }

                                                    if (zip_code == "") {
                                                        $('#uzerror').text("Enter Zip Code");
                                                        $('#zip_code').css('border-color', "red");
                                                        $('#zip_code').focus();
                                                        return false;
                                                    }


                                            

                                                    if (user_image != "") {
                                                        var arr = user_image.split("."); //split user image using dot(.).ex:bit.sem6.jpg is split to 3 values. 
                                                        var l = arr.length - 1;
                                                        var ext = arr[l].toLowerCase();
                                                        var extarr = ['jpg', 'jpeg', 'gif', 'png', 'tiff', 'svg'];
                                                        if ($.inArray(ext, extarr) == -1) {//check that ext variable is included in extarr array.if included then position is display .if not -1 will display.
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

                                                    if (city_id == "") {
                                                        $('#urerror').text("Select a City");
                                                        $('#city_id').css('border-color', "red");
                                                        $('#city_id').focus();
                                                        return false;// i
                                                    }
                                                    if (pro_id  == "") {
                                                        $('#uperror').text("Select a City");
                                                        $('#pro_id').css('border-color', "red");
                                                        $('#pro_id').focus();
                                                        return false;// i
                                                    }


                                                });


$('#cus_fname').keypress(function () {
                                                    $('#uferror').text("");//to delete error message after enter a text
                                                });
$('#cus_lname').keypress(function () {
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


$('#city_id').change(function () {
                                                    $('#ucerror').text("");//to delete error message after select a district 
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
                                            function checkCusEmail(str) {
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
                                                        document.getElementById("showEmail").innerHTML = this.responseText;//get responce and show that imail in showemail span

                                                    }
                                                };
                                                xhttp.open("GET", "../ajax/getCusEmail.php?q=" + str, true); //send str and get requst from getemail.true is for expecting respond.if there is false not expecting respond. (1)
                                                xhttp.send();// after send xhttp.onreadystatechange = function () { is execute(2)
                                                }
