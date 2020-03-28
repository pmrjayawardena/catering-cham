$(document).ready(function(){

    (function($) {
        "use strict";


        jQuery.validator.addMethod('answercheck', function (value, element) {
            return this.optional(element) || /^\bcat\b$/.test(value)
        }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 5
                },
                lastname: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                telephone: {
                    required: true,
                    minlength: 10
                },
                event_type: {
                    required: true,
                    minlength: 4
                },
                no_of_guests: {
                    required: true,
                    minlength: 2
                },
                location: {
                    required: true,
                    minlength: 4
                },

                event_date: {
                    required: true,
                    minlength: 4
                },

                type_of_food: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "come on, you have a name, don't you?",
                    minlength: "your name must consist of at least 2 characters"
                },
                last: {
                    required: "come on, you have a last name, don't you?",
                    minlength: "your name must consist of at least 2 characters"
                },

                email: {
                    required: "no email, no message"
                },
                telephone: {
                    required: "Please Enter a Telephone number",
                    minlength: "your telephone should start with ex-077"
                },

                event_type: {
                    required: "Please Enter the name of the event",
                    minlength: "enter the event type"
                },
                no_of_guests: {
                    required: "come on, There should be guests in an event",
                    minlength: "No of Guests should be at least 50"
                },

                location: {
                    required: "come on, you have an address, don't you?",
                    minlength: "your address must consist of at least 4 characters"
                },

                event_date: {
                    required: "Please Enter a valid event date",
                    minlength: "No date No Delivery"
                },

                type_of_food: {
                    required: "Type the foods that required for that day",
                    minlength: "search on the website to see types of food required"
                }
            },

        })
    })

})(jQuery)
})