$(document).ready(function($) {

    $('#p1').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t1").attr("disabled", "disabled"); 
            $('#t1').val('');
        } else {
            $("#t1").removeAttr("disabled"); 
        }
    });
    
    $('#p2').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t2").attr("disabled", "disabled");
            $('#t2').val('');
        } else {
            $("#t2").removeAttr("disabled"); 
        }
    });
    

    
    $('#p3').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t3").attr("disabled", "disabled");
            $('#t3').val('');
        } else {
            $("#t3").removeAttr("disabled"); 
        }
    });
    
    $('#p4').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t4").attr("disabled", "disabled"); 
            $('#t4').val('');
        } else {
            $("#t4").removeAttr("disabled"); 
        }
    });
    
    $('#p5').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t5").attr("disabled", "disabled"); 
            $('#t5').val('');
        } else {
            $("#t5").removeAttr("disabled"); 
        }
    });
    
    $('#p6').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t6").attr("disabled", "disabled"); 
            $('#t6').val('');
        } else {
            $("#t6").removeAttr("disabled"); 
        }
    });
    
    $('#p7').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t7").attr("disabled", "disabled");
            $('#t7').val('');
        } else {
            $("#t7").removeAttr("disabled"); 
        }
    });
    
    $('#p8').change(function() {
        if($(this).is(":checked")) {
            //alert ("The element with id " + this.id + " changed.");
            $("#t8").attr("disabled", "disabled");
            $('#t8').val('');
        } else {
            $("#t8").removeAttr("disabled"); 
        }
    });
    
    
    
    $('#t1').click(function() {

            $('#t1').val('');

    });
    
    $('#t2').click(function() {

            $('#t2').val('');

    });
    
    $('#t3').click(function() {

            $('#t3').val('');

    });
    
    $('#t4').click(function() {

            $('#t4').val('');

    });
    
    $('#t5').click(function() {

            $('#t5').val('');

    });
    
    $('#t6').click(function() {

            $('#t6').val('');

    });
    
    $('#t7').click(function() {

            $('#t7').val('');

    });
    
    $('#t8').click(function() {

            $('#t8').val('');

    });
});