function validateForm() {
    var fname = document.forms["cusform"]["cusfirstname"].value;
    var lname = document.forms["cusform"]["cuslastname"].value;
    var email = document.forms["cusform"]["cusemail"].value;
    var pass = document.forms["cusform"]["cuspass"].value;
    var zip = document.forms["cusform"]["cuszipcode"].value;
    if (fname == null || fname == "" ||
    	lname == null || lname == "" ||
    	email == null || email == "" ||
    	pass == null || pass == "" ||
    	zip == null || zip == "") 
    {
        var error = "You must fill in all fields.";
        document.getElementById("formerror").innerHTML = error;
        return false;
    }
}