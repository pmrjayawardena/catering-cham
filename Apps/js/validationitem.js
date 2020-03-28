                                                $(document).ready(function () { //if this page is load to browser then execute this code(call back functions)
                                                $('form').submit(function () { // this is happenning when submit button is clicked

                                                    var cat_id = $('#cat_id').val(); //val is use to getting value of inside element 
                                        


                                                    if (cat_id == "") {
                                                        $('#umerror').text("Empty Category"); //if fname is empty then do this
                                                        $('#cat_id').css('border-color', "red");
                                                        $('#cat_id').focus();  //focus the pointer to the relevent input feild
                                                        return false;// is yes then dont go to server
                                                    }
                         
                                                });


                                                $('#cat_id').keypress(function () {
                                                    $('#umerror').text("");//to delete error message after enter a text
                                                });










                                            });
