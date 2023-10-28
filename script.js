$(document).ready(function() {
    $("#signup-form").submit(function(event) {
        var age = $("#age").val();
        var email = $("#email").val();
        var dob = $("#dob").val();
        var contact = $("#contact").val();

        var valid = true;

        if (!$.isNumeric(age)) {
            valid = false;
            alert("Age must be a number.");
        }

        if (!isValidEmail(email)) {
            valid = false;
            alert("Invalid email address.");
        }

        if (!isValidDate(dob)) {
            valid = false;
            alert("Invalid date format. Please use dd-mm-yyyy.");
        }
        var originalDate = $("#dob").val();
                var convertedDate = convertDateFormat(originalDate);

                $.ajax({
                    type: "POST",
                    url: "index.php", 
                    data: {
                        dob: convertedDate
                    }
                });



        /*function convertDateFormat(date) {
            var dateParts = date.split("-");
            if (dateParts.length === 3) {
                var day = dateParts[0];
                var month = dateParts[1];
                var year = dateParts[2];
                return year + "-" + month + "-" + day;
            } else {
                // Handle invalid date format
                return "";
            }
        }*/

        if (!/^\d{10}$/.test(contact)) {
            valid = false;
            alert("Contact number must be exactly 10 digits.");
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidDate(date) {
        var dateRegex = /^\d{2}-\d{2}-\d{4}$/;
        return dateRegex.test(date);
    }
});
