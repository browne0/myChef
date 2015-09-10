function showFormCustomer()
    {
        document.getElementById("chefoption").style.display="none" ;
        document.getElementById("option2").style.border="none" ;
        document.getElementById("cusoption").style.display="block" ;
        document.getElementById("option1").style.borderBottom="5px solid #e75967" 
    }

    function showFormChef()
    {
        document.getElementById("cusoption").style.display="none" ;
        document.getElementById("option1").style.border="none" ;
        document.getElementById("chefoption").style.display="block" ;
        document.getElementById("option2").style.borderBottom="5px solid #e75967" 
    }

$(document).ready(function(){

    $(".submitzip").keypress(function(event) {
        if (event.which == 13) {
            event.preventDefault();
            $("form").submit();
        }
    });

    $(".enterzip").focus(function(){
        $(".inputmarker").css({
            'box-shadow' : '2px 3px 5px 0px rgba(103, 40, 46, 0.57)',
            '-webkit-box-shadow' : '2px 3px 5px 0px rgba(103, 40, 46, 0.57)',
            '-moz-box-shadow' : '2px 3px 5px 0px rgba(103, 40, 46, 0.57)'
        });
    });

    $(".enterzip").blur(function(){
        $(".inputmarker").css({
            'box-shadow' : 'none',
            '-webkit-box-shadow' : 'none',
            '-moz-box-shadow' : 'none'
        });
    });
});