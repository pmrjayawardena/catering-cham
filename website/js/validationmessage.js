$(document).ready(function () { //if this page is load to browser then execute this code(call back functions)
                                                $('form').submit(function () { // this is happenning when submit button is clicked

                                                    var user_fname = $('#cus_fname').val(); //val is use to getting value of inside eliment 
                                                    var user_lname = $('#cus_lname').val();
                                                    var user_email = $('#cus_email').val();
                                                    var cus_subject = $('#cus_subject').val();
                                                    var cus_message = $('#cus_message').val();
                                                    
                                           

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

                                         

                                                    if (cus_email == "") {
                                                        $('#ueerror').text("Empty Email");
                                                        $('#cus_email').css('border-color', "red");
                                                        $('#cus_email').focus();
                                                        return false;// i
                                                    }

                                               if (cus_subject == "") {
                                                        $('#ueerror').text("Empty Subject");
                                                        $('#cus_subject').css('border-color', "red");
                                                        $('#cus_subject').focus();
                                                        return false;// i
                                                    }
                                                          if (cus_message == "") {
                                                        $('#ueerror').text("Empty Message");
                                                        $('#cus_message').css('border-color', "red");
                                                        $('#cus_message').focus();
                                                        return false;// i
                                                    }
        if (cus_fname == "") {
                                                        $('#ueerror').text("Empty Subject");
                                                        $('#cus_fname').css('border-color', "red");
                                                        $('#cus_fname').focus();
                                                        return false;// i
                                                    }
                                                    


                                                });


                                                $('#cus_fname').keypress(function () {
                                                    $('#uferror').text("");//to delete error message after enter a text
                                                });
                                                $('#cus_lname').keypress(function () {
                                                    $('#ulerror').text("");//to delete error message after enter a text 
                                                });


                                                $('#cus_email').keypress(function () {
                                                    $('#ueerror').text("");//to delete error message after enter a text 
                                                });

                                                $('#cus_subject').keypress(function () {
                                                    $('#uterror').text("");//to delete error message after enter a text 
                                                });

                                                $('#cus_message').keypress(function () {
                                                    $('#unerror').text("");//to delete error message after enter a text 
                                                });

                                
                                            });


