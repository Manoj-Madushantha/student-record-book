$(document).ready(function($) {

    "use strict";
                // Grade 6-9 Section
    
                    $('#period-01-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-01-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
                        
                        case "29":
                            $('#period-01-table69').append('<tr><td>7.50 - 8.30</td><td>Art</td><td><input type="checkbox" id="ar69p1" name="srb[ar69p1]" value="ar69p1" ></td><td><input list="reason" name="srb[ar69t1]"  id="ar69t1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-01-table69').append('<tr><td>7.50 - 8.30</td><td>Dancing</td><td><input type="checkbox" id="dc69p1" name="srb[dc69p1]" value="dc69p1" ></td><td><input list="reason" name="srb[dc69t1]"  id="dc69t1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-01-table69').append('<tr><td>7.50 - 8.30</td><td>Oriental Music</td><td><input type="checkbox" id="om69p1" name="srb[om69p1]" value="om69p1"></td><td><input list="reason" name="srb[om69t1]"  id="om69t1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-01-table69').append('<tr><td>7.50 - 8.30</td><td>Western Music</td><td><input type="checkbox" id="wm69p1" name="srb[wm69p1]" value="wm69p1"></td><td><input list="reason" name="srb[wm69t1]"  id="wm69t1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-01-table69').append('<tr><td>7.50 - 8.30</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p1" name="srb[dr69p1]" value="dr69p1"></td><td><input list="reason" name="srb[dr69t1]"  id="dr69t1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
                                
                        
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t1").attr("disabled", "disabled");
                        $('#ar69t1').val('');
                    } else {
                        $("#ar69t1").removeAttr("disabled"); 
                    }
                });
                $('#dc69p1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t1").attr("disabled", "disabled");
                        $('#dc69t1').val('');
                    } else {
                        $("#dc69t1").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t1").attr("disabled", "disabled");
                        $('#om69t1').val('');
                    } else {
                        $("#om69t1").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t1").attr("disabled", "disabled");
                        $('#wm69t1').val('');
                    } else {
                        $("#wm69t1").removeAttr("disabled"); 
                    }
                });
                $('#dr69p1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t1").attr("disabled", "disabled");
                        $('#dr69t1').val('');
                    } else {
                        $("#dr69t1").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t1').click(function() {
    
                        $('#ar69t1').val('');
    
                });
    
                $('#dc69t1').click(function() {
    
                        $('#dc69t1').val('');
    
                });
    
                $('#dc69t1').click(function() {
    
                        $('#dc69t1').val('');
    
                });
    
                $('#om69t1').click(function() {
    
                        $('#om69t1').val('');
    
                });
    
                $('#om69t1').click(function() {
    
                        $('#om69t1').val('');
    
                });
    
                $('#dr69t1').click(function() {
    
                        $('#dr69t1').val('');
    
                });
    
                
    
                });
                
                $('#period-02-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-02-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-02-table69').append('<tr><td>8.30 - 9.10</td><td>Art</td><td><input type="checkbox" id="ar69p2" name="srb[ar69p2]" value="ar69p2" ></td><td><input list="reason" name="srb[ar69t2]"  id="ar69t2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-02-table69').append('<tr><td>8.30 - 9.10</td><td>Dancing</td><td><input type="checkbox" id="dc69p2" name="srb[dc69p2]" value="dc69p2" ></td><td><input list="reason" name="srb[dc69t2]"  id="dc69t2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-02-table69').append('<tr><td>8.30 - 9.10</td><td>Oriental Music</td><td><input type="checkbox" id="om69p2" name="srb[om69p2]" value="om69p2"></td><td><input list="reason" name="srb[om69t2]"  id="om69t2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-02-table69').append('<tr><td>8.30 - 9.10</td><td>Western Music</td><td><input type="checkbox" id="wm69p2" name="srb[wm69p2]" value="wm69p2"></td><td><input list="reason" name="srb[wm69t2]"  id="wm69t2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-02-table69').append('<tr><td>8.30 - 9.10</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p2" name="srb[dr69p2]" value="dr69p2"></td><td><input list="reason" name="srb[dr69t2]"  id="dr69t2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t2").attr("disabled", "disabled");
                        $('#ar69t2').val('');
                    } else {
                        $("#ar69t2").removeAttr("disabled"); 
                    }
                });
                $('#dc69p2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t2").attr("disabled", "disabled");
                        $('#dc69t2').val('');
                    } else {
                        $("#dc69t2").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t2").attr("disabled", "disabled");
                        $('#om69t2').val('');
                    } else {
                        $("#om69t2").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t2").attr("disabled", "disabled");
                        $('#wm69t2').val('');
                    } else {
                        $("#wm69t2").removeAttr("disabled"); 
                    }
                });
                $('#dr69p2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t2").attr("disabled", "disabled");
                        $('#dr69t2').val('');
                    } else {
                        $("#dr69t2").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t2').click(function() {
    
                        $('#ar69t2').val('');
    
                });
    
                $('#dc69t2').click(function() {
    
                        $('#dc69t2').val('');
    
                });
    
                $('#dc69t2').click(function() {
    
                        $('#dc69t2').val('');
    
                });
    
                $('#om69t2').click(function() {
    
                        $('#om69t2').val('');
    
                });
    
                $('#om69t2').click(function() {
    
                        $('#om69t2').val('');
    
                });
    
                $('#dr69t2').click(function() {
    
                        $('#dr69t2').val('');
    
                });
    
                
    
                });
    
                
                $('#period-03-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-03-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-03-table69').append('<tr><td>9.10 - 9.50</td><td>Art</td><td><input type="checkbox" id="ar69p3" name="srb[ar69p3]" value="ar69p3" ></td><td><input list="reason" name="srb[ar69t3]"  id="ar69t3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-03-table69').append('<tr><td>9.10 - 9.50</td><td>Dancing</td><td><input type="checkbox" id="dc69p3" name="srb[dc69p3]" value="dc69p3" ></td><td><input list="reason" name="srb[dc69t3]"  id="dc69t3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-03-table69').append('<tr><td>9.10 - 9.50</td><td>Oriental Music</td><td><input type="checkbox" id="om69p3" name="srb[om69p3]" value="om69p3"></td><td><input list="reason" name="srb[om69t3]"  id="om69t3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-03-table69').append('<tr><td>9.10 - 9.50</td><td>Western Music</td><td><input type="checkbox" id="wm69p3" name="srb[wm69p3]" value="wm69p3"></td><td><input list="reason" name="srb[wm69t3]"  id="wm69t3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-03-table69').append('<tr><td>9.10 - 9.50</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p3" name="srb[dr69p3]" value="dr69p3"></td><td><input list="reason" name="srb[dr69t3]"  id="dr69t3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t3").attr("disabled", "disabled");
                        $('#ar69t3').val('');
                    } else {
                        $("#ar69t3").removeAttr("disabled"); 
                    }
                });
                $('#dc69p3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t3").attr("disabled", "disabled");
                        $('#dc69t3').val('');
                    } else {
                        $("#dc69t3").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t3").attr("disabled", "disabled");
                        $('#om69t3').val('');
                    } else {
                        $("#om69t3").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t3").attr("disabled", "disabled");
                        $('#wm69t3').val('');
                    } else {
                        $("#wm69t3").removeAttr("disabled"); 
                    }
                });
                $('#dr69p3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t3").attr("disabled", "disabled");
                        $('#dr69t3').val('');
                    } else {
                        $("#dr69t3").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t3').click(function() {
    
                        $('#ar69t3').val('');
    
                });
    
                $('#dc69t3').click(function() {
    
                        $('#dc69t3').val('');
    
                });
    
                $('#dc69t3').click(function() {
    
                        $('#dc69t3').val('');
    
                });
    
                $('#om69t3').click(function() {
    
                        $('#om69t3').val('');
    
                });
    
                $('#om69t3').click(function() {
    
                        $('#om69t3').val('');
    
                });
    
                $('#dr69t3').click(function() {
    
                        $('#dr69t3').val('');
    
                });
    
                
    
                });
            
                
                
                $('#period-04-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-04-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-04-table69').append('<tr><td>9.10 - 9.50</td><td>Art</td><td><input type="checkbox" id="ar69p4" name="srb[ar69p4]" value="ar69p4" ></td><td><input list="reason" name="srb[ar69t4]"  id="ar69t4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-04-table69').append('<tr><td>9.10 - 9.50</td><td>Dancing</td><td><input type="checkbox" id="dc69p4" name="srb[dc69p4]" value="dc69p4" ></td><td><input list="reason" name="srb[dc69t4]"  id="dc69t4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-04-table69').append('<tr><td>9.10 - 9.50</td><td>Oriental Music</td><td><input type="checkbox" id="om69p4" name="srb[om69p4]" value="om69p4"></td><td><input list="reason" name="srb[om69t4]"  id="om69t4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-04-table69').append('<tr><td>9.10 - 9.50</td><td>Western Music</td><td><input type="checkbox" id="wm69p4" name="srb[wm69p4]" value="wm69p4"></td><td><input list="reason" name="srb[wm69t4]"  id="wm69t4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-04-table69').append('<tr><td>9.10 - 9.50</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p4" name="srb[dr69p4]" value="dr69p4"></td><td><input list="reason" name="srb[dr69t4]"  id="dr69t4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t4").attr("disabled", "disabled");
                        $('#ar69t4').val('');
                    } else {
                        $("#ar69t4").removeAttr("disabled"); 
                    }
                });
                $('#dc69p4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t4").attr("disabled", "disabled");
                        $('#dc69t4').val('');
                    } else {
                        $("#dc69t4").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t4").attr("disabled", "disabled");
                        $('#om69t4').val('');
                    } else {
                        $("#om69t4").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t4").attr("disabled", "disabled");
                        $('#wm69t4').val('');
                    } else {
                        $("#wm69t4").removeAttr("disabled"); 
                    }
                });
                $('#dr69p4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t4").attr("disabled", "disabled");
                        $('#dr69t4').val('');
                    } else {
                        $("#dr69t4").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t4').click(function() {
    
                        $('#ar69t4').val('');
    
                });
    
                $('#dc69t4').click(function() {
    
                        $('#dc69t4').val('');
    
                });
    
                $('#dc69t4').click(function() {
    
                        $('#dc69t4').val('');
    
                });
    
                $('#om69t4').click(function() {
    
                        $('#om69t4').val('');
    
                });
    
                $('#om69t4').click(function() {
    
                        $('#om69t4').val('');
    
                });
    
                $('#dr69t4').click(function() {
    
                        $('#dr69t4').val('');
    
                });
    
                
    
                });
                
                
                
                $('#period-05-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-05-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-05-table69').append('<tr><td>9.50 - 10.30</td><td>Art</td><td><input type="checkbox" id="ar69p5" name="srb[ar69p5]" value="ar69p5" ></td><td><input list="reason" name="srb[ar69t5]"  id="ar69t5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-05-table69').append('<tr><td>9.50 - 10.30</td><td>Dancing</td><td><input type="checkbox" id="dc69p5" name="srb[dc69p5]" value="dc69p5" ></td><td><input list="reason" name="srb[dc69t5]"  id="dc69t5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-05-table69').append('<tr><td>9.50 - 10.30</td><td>Oriental Music</td><td><input type="checkbox" id="om69p5" name="srb[om69p5]" value="om69p5"></td><td><input list="reason" name="srb[om69t5]"  id="om69t5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-05-table69').append('<tr><td>9.50 - 10.30</td><td>Western Music</td><td><input type="checkbox" id="wm69p5" name="srb[wm69p5]" value="wm69p5"></td><td><input list="reason" name="srb[wm69t5]"  id="wm69t5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-05-table69').append('<tr><td>9.50 - 10.30</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p5" name="srb[dr69p5]" value="dr69p5"></td><td><input list="reason" name="srb[dr69t5]"  id="dr69t5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t5").attr("disabled", "disabled");
                        $('#ar69t5').val('');
                    } else {
                        $("#ar69t5").removeAttr("disabled"); 
                    }
                });
                $('#dc69p5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t5").attr("disabled", "disabled");
                        $('#dc69t5').val('');
                    } else {
                        $("#dc69t5").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t5").attr("disabled", "disabled");
                        $('#om69t5').val('');
                    } else {
                        $("#om69t5").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t5").attr("disabled", "disabled");
                        $('#wm69t5').val('');
                    } else {
                        $("#wm69t5").removeAttr("disabled"); 
                    }
                });
                $('#dr69p5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t5").attr("disabled", "disabled");
                        $('#dr69t5').val('');
                    } else {
                        $("#dr69t5").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t5').click(function() {
    
                        $('#ar69t5').val('');
    
                });
    
                $('#dc69t5').click(function() {
    
                        $('#dc69t5').val('');
    
                });
    
                $('#dc69t5').click(function() {
    
                        $('#dc69t5').val('');
    
                });
    
                $('#om69t5').click(function() {
    
                        $('#om69t5').val('');
    
                });
    
                $('#om69t5').click(function() {
    
                        $('#om69t5').val('');
    
                });
    
                $('#dr69t5').click(function() {
    
                        $('#dr69t5').val('');
    
                });
    
                
    
                });
                
                
                
                $('#period-06-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-06-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-06-table69').append('<tr><td>10.50 - 11.30</td><td>Art</td><td><input type="checkbox" id="ar69p6" name="srb[ar69p6]" value="ar69p6" ></td><td><input list="reason" name="srb[ar69t6]"  id="ar69t6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-06-table69').append('<tr><td>10.50 - 11.30</td><td>Dancing</td><td><input type="checkbox" id="dc69p6" name="srb[dc69p6]" value="dc69p6" ></td><td><input list="reason" name="srb[dc69t6]"  id="dc69t6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-06-table69').append('<tr><td>10.50 - 11.30</td><td>Oriental Music</td><td><input type="checkbox" id="om69p6" name="srb[om69p6]" value="om69p6"></td><td><input list="reason" name="srb[om69t6]"  id="om69t6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-06-table69').append('<tr><td>10.50 - 11.30</td><td>Western Music</td><td><input type="checkbox" id="wm69p6" name="srb[wm69p6]" value="wm69p6"></td><td><input list="reason" name="srb[wm69t6]"  id="wm69t6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-06-table69').append('<tr><td>10.50 - 11.30</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p6" name="srb[dr69p6]" value="dr69p6"></td><td><input list="reason" name="srb[dr69t6]"  id="dr69t6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t6").attr("disabled", "disabled");
                        $('#ar69t6').val('');
                    } else {
                        $("#ar69t6").removeAttr("disabled"); 
                    }
                });
                $('#dc69p6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t6").attr("disabled", "disabled");
                        $('#dc69t6').val('');
                    } else {
                        $("#dc69t6").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t6").attr("disabled", "disabled");
                        $('#om69t6').val('');
                    } else {
                        $("#om69t6").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t6").attr("disabled", "disabled");
                        $('#wm69t6').val('');
                    } else {
                        $("#wm69t6").removeAttr("disabled"); 
                    }
                });
                $('#dr69p6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t6").attr("disabled", "disabled");
                        $('#dr69t6').val('');
                    } else {
                        $("#dr69t6").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t6').click(function() {
    
                        $('#ar69t6').val('');
    
                });
    
                $('#dc69t6').click(function() {
    
                        $('#dc69t6').val('');
    
                });
    
                $('#dc69t6').click(function() {
    
                        $('#dc69t6').val('');
    
                });
    
                $('#om69t6').click(function() {
    
                        $('#om69t6').val('');
    
                });
    
                $('#om69t6').click(function() {
    
                        $('#om69t6').val('');
    
                });
    
                $('#dr69t6').click(function() {
    
                        $('#dr69t6').val('');
    
                });
    
                
    
                });
                
                
                
                
                $('#period-07-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-07-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-07-table69').append('<tr><td>11.30 - 12.10</td><td>Art</td><td><input type="checkbox" id="ar69p7" name="srb[ar69p7]" value="ar69p7" ></td><td><input list="reason" name="srb[ar69t7]"  id="ar69t7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-07-table69').append('<tr><td>11.30 - 12.10</td><td>Dancing</td><td><input type="checkbox" id="dc69p7" name="srb[dc69p7]" value="dc69p7" ></td><td><input list="reason" name="srb[dc69t7]"  id="dc69t7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-07-table69').append('<tr><td>11.30 - 12.10</td><td>Oriental Music</td><td><input type="checkbox" id="om69p7" name="srb[om69p7]" value="om69p7"></td><td><input list="reason" name="srb[om69t7]"  id="om69t7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-07-table69').append('<tr><td>11.30 - 12.10</td><td>Western Music</td><td><input type="checkbox" id="wm69p7" name="srb[wm69p7]" value="wm69p7"></td><td><input list="reason" name="srb[wm69t7]"  id="wm69t7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-07-table69').append('<tr><td>11.30 - 12.10</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p7" name="srb[dr69p7]" value="dr69p7"></td><td><input list="reason" name="srb[dr69t7]"  id="dr69t7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t7").attr("disabled", "disabled");
                        $('#ar69t7').val('');
                    } else {
                        $("#ar69t7").removeAttr("disabled"); 
                    }
                });
                $('#dc69p7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t7").attr("disabled", "disabled");
                        $('#dc69t7').val('');
                    } else {
                        $("#dc69t7").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t7").attr("disabled", "disabled");
                        $('#om69t7').val('');
                    } else {
                        $("#om69t7").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t7").attr("disabled", "disabled");
                        $('#wm69t7').val('');
                    } else {
                        $("#wm69t7").removeAttr("disabled"); 
                    }
                });
                $('#dr69p7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t7").attr("disabled", "disabled");
                        $('#dr69t7').val('');
                    } else {
                        $("#dr69t7").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t7').click(function() {
    
                        $('#ar69t7').val('');
    
                });
    
                $('#dc69t7').click(function() {
    
                        $('#dc69t7').val('');
    
                });
    
                $('#dc69t7').click(function() {
    
                        $('#dc69t7').val('');
    
                });
    
                $('#om69t7').click(function() {
    
                        $('#om69t7').val('');
    
                });
    
                $('#om69t7').click(function() {
    
                        $('#om69t7').val('');
    
                });
    
                $('#dr69t7').click(function() {
    
                        $('#dr69t7').val('');
    
                });
    
                
    
                });
                
                
                
                
                
                $('#period-08-drop-down69').on('change', function() {
                    var value = $(this).val();
    
                    $('#period-08-table69').empty();
    
                    switch (value) {
                        case "0":
                            break;
    
                        case "29":
                            $('#period-08-table69').append('<tr><td>11.30 - 12.10</td><td>Art</td><td><input type="checkbox" id="ar69p8" name="srb[ar69p8]" value="ar69p8" ></td><td><input list="reason" name="srb[ar69t8]"  id="ar69t8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-08-table69').append('<tr><td>11.30 - 12.10</td><td>Dancing</td><td><input type="checkbox" id="dc69p8" name="srb[dc69p8]" value="dc69p8" ></td><td><input list="reason" name="srb[dc69t8]"  id="dc69t8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-08-table69').append('<tr><td>11.30 - 12.10</td><td>Oriental Music</td><td><input type="checkbox" id="om69p8" name="srb[om69p8]" value="om69p8"></td><td><input list="reason" name="srb[om69t8]"  id="om69t8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-08-table69').append('<tr><td>11.30 - 12.10</td><td>Western Music</td><td><input type="checkbox" id="wm69p8" name="srb[wm69p8]" value="wm69p8"></td><td><input list="reason" name="srb[wm69t8]"  id="wm69t8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            $('#period-08-table69').append('<tr><td>11.30 - 12.10</td><td>Drama & Performing Art</td><td><input type="checkbox" id="dr69p8" name="srb[dr69p8]" value="dr69p8"></td><td><input list="reason" name="srb[dr69t8]"  id="dr69t8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>');
                            break;
    
    
                        default:
                            break;
                    }
    
                //textbox disable functions    
                $('#ar69p8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ar69t8").attr("disabled", "disabled");
                        $('#ar69t8').val('');
                    } else {
                        $("#ar69t8").removeAttr("disabled"); 
                    }
                });
                $('#dc69p8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dc69t8").attr("disabled", "disabled");
                        $('#dc69t8').val('');
                    } else {
                        $("#dc69t8").removeAttr("disabled"); 
                    }
                });
    
                $('#om69p8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#om69t8").attr("disabled", "disabled");
                        $('#om69t8').val('');
                    } else {
                        $("#om69t8").removeAttr("disabled"); 
                    }
                });
    
                $('#wm69p8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wm69t8").attr("disabled", "disabled");
                        $('#wm69t8').val('');
                    } else {
                        $("#wm69t8").removeAttr("disabled"); 
                    }
                });
                $('#dr69p8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dr69t8").attr("disabled", "disabled");
                        $('#dr69t8').val('');
                    } else {
                        $("#dr69t8").removeAttr("disabled"); 
                    }
                });
    
            
                //textbox clear functions
                $('#ar69t8').click(function() {
    
                        $('#ar69t8').val('');
    
                });
    
                $('#dc69t8').click(function() {
    
                        $('#dc69t8').val('');
    
                });
    
                $('#dc69t8').click(function() {
    
                        $('#dc69t8').val('');
    
                });
    
                $('#om69t8').click(function() {
    
                        $('#om69t8').val('');
    
                });
    
                $('#om69t8').click(function() {
    
                        $('#om69t8').val('');
    
                });
    
                $('#dr69t8').click(function() {
    
                        $('#dr69t8').val('');
    
                });
    
                
    
                });
                
                
                $('#period-01-drop-down').on('change', function() {
                    var value = $(this).val();
                    
                    $('#period-01-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp1" name="srb[basp1]" value="basp1" ></td><td><input list="reason" name="srb[bast1]"  id="bast1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Geography</td><td><input type="checkbox" id="geop1" name="srb[geop1]" value="geop1" ></td><td><input list="reason" name="srb[geot1]"  id="geot1"  /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Civic Education</td><td><input type="checkbox" id="cep1" name="srb[cep1]" value="cep1"  ></td><td><input list="reason" name="srb[cet1]"  id="cet1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>French</td><td><input type="checkbox" id="frp1" name="srb[frp1]" value="frp1"></td><td><input list="reason" name="srb[frt1]"  id="frt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Japanese</td><td><input type="checkbox" id="jpp1" name="srb[jpp1]" value="jpp1" ></td><td><input list="reason" name="srb[jpt1]"  id="jpt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Korean</td><td><input type="checkbox" id="krp1" name="srb[krp1]" value="krp1"></td><td><input list="reason" name="srb[krt1]"  id="krt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Tamil</td><td><input type="checkbox" id="tap1" name="srb[tap1]" value="tap1"></td><td><input list="reason" name="srb[tat1]"  id="tat1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Oriental Music</td><td><input type="checkbox" id="omp1" name="srb[omp1]" value="omp1"></td><td><input list="reason" name="srb[omt1]"  id="omt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Western Music</td><td><input type="checkbox" id="wmp1" name="srb[wmp1]" value="wmp1"></td><td><input list="reason" name="srb[wmt1]"  id="wmt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp1" name="srb[odp1]" value="odp1"></td><td><input list="reason" name="srb[odt1]"  id="odt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Art</td><td><input type="checkbox" id="arp1" name="srb[arp1]" value="arp1"></td><td><input list="reason" name="srb[art1]"  id="art1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp1" name="srb[eltp1]" value="eltp1"></td><td><input list="reason" name="srb[eltt1]"  id="eltt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp1" name="srb[slp1]" value="slp1"></td><td><input list="reason" name="srb[slt1]"  id="slt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp1" name="srb[dtp1]" value="dtp1"></td><td><input list="reason" name="srb[dtt1]"  id="dtt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp1" name="srb[ictp1]" value="ictp1"></td><td><input list="reason" name="srb[ictt1]"  id="ictt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp1" name="srb[aftp1]" value="aftp1"></td><td><input list="reason" name="srb[aftt1]"  id="aftt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep1" name="srb[hpep1]" value="hpep1"></td><td><input list="reason" name="srb[hpet1]"  id="hpet1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp1" name="srb[cmsp1]" value="cmsp1"></td><td><input list="reason" name="srb[cmst1]"  id="cmst1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-01-table').append('<tr><td>7.50 - 8.30</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp1" name="srb[dmtp1]" value="dmtp1"></td><td><input list="reason" name="srb[dmtt1]"  id="dmtt1" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                
                
                
                });
                
                $('#period-02-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-02-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp2" name="srb[basp2]" value="basp2" ></td><td><input list="reason" name="srb[bast2]"  id="bast2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Geography</td><td><input type="checkbox" id="geop2" name="srb[geop2]" value="geop2" ></td><td><input list="reason" name="srb[geot2]"  id="geot2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Civic Education</td><td><input type="checkbox" id="cep2" name="srb[cep2]" value="cep2"></td><td><input list="reason" name="srb[cet2]"  id="cet2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>French</td><td><input type="checkbox" id="frp2" name="srb[frp2]" value="frp2"></td><td><input list="reason" name="srb[frt2]"  id="frt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Japanese</td><td><input type="checkbox" id="jpp2" name="srb[jpp2]" value="jpp2"></td><td><input list="reason" name="srb[jpt2]"  id="jpt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Korean</td><td><input type="checkbox" id="krp2" name="srb[krp2]" value="krp2"></td><td><input list="reason" name="srb[krt2]"  id="krt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Tamil</td><td><input type="checkbox" id="tap2" name="srb[tap2]" value="tap2"></td><td><input list="reason" name="srb[tat2]"  id="tat2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Oriental Music</td><td><input type="checkbox" id="omp2" name="srb[omp2]" value="omp2"></td><td><input list="reason" name="srb[omt2]"  id="omt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Western Music</td><td><input type="checkbox" id="wmp2" name="srb[wmp2]" value="wmp2"></td><td><input list="reason" name="srb[wmt2]"  id="wmt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp2" name="srb[odp2]" value="odp2"></td><td><input list="reason" name="srb[odt2]"  id="odt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Art</td><td><input type="checkbox" id="arp2" name="srb[arp2]" value="arp2"></td><td><input list="reason" name="srb[art2]"  id="art2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp2" name="srb[eltp2]" value="eltp2"></td><td><input list="reason" name="srb[eltt2]"  id="eltt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp2" name="srb[slp2]" value="slp2"></td><td><input list="reason" name="srb[slt2]"  id="slt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp2" name="srb[dtp2]" value="dtp2"></td><td><input list="reason" name="srb[dtt2]"  id="dtt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp2" name="srb[ictp2]" value="ictp2"></td><td><input list="reason" name="srb[ictt2]"  id="ictt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp2" name="srb[aftp2]" value="aftp2"></td><td><input list="reason" name="srb[aftt2]"  id="aftt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep2" name="srb[hpep2]" value="hpep2"></td><td><input list="reason" name="srb[hpet2]"  id="hpet2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp2" name="srb[cmsp2]" value="cmsp2"></td><td><input list="reason" name="srb[cmst2]"  id="cmst2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-02-table').append('<tr><td>8.30 - 9.10</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp2" name="srb[dmtp2]" value="dmtp2"></td><td><input list="reason" name="srb[dmtt2]"  id="dmtt2" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                   
                });
                
                $('#period-03-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-03-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp3" name="srb[basp3]" value="basp3" ></td><td><input list="reason" name="srb[bast3]"  id="bast3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Geography</td><td><input type="checkbox" id="geop3" name="srb[geop3]" value="geop3" ></td><td><input list="reason" name="srb[geot3]"  id="geot3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Civic Education</td><td><input type="checkbox" id="cep3" name="srb[cep3]" value="cep3"></td><td><input list="reason" name="srb[cet3]"  id="cet3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>French</td><td><input type="checkbox" id="frp3" name="srb[frp3]" value="frp3"></td><td><input list="reason" name="srb[frt3]"  id="frt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Japanese</td><td><input type="checkbox" id="jpp3" name="srb[jpp3]" value="jpp3"></td><td><input list="reason" name="srb[jpt3]"  id="jpt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Korean</td><td><input type="checkbox" id="krp3" name="srb[krp3]" value="krp3"></td><td><input list="reason" name="srb[krt3]"  id="krt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>8.30 - 9.10</td><td>Tamil</td><td><input type="checkbox" id="tap3" name="srb[tap3]" value="tap3"></td><td><input list="reason" name="srb[tat3]"  id="tat3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Oriental Music</td><td><input type="checkbox" id="omp3" name="srb[omp3]" value="omp3"></td><td><input list="reason" name="srb[omt3]"  id="omt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Western Music</td><td><input type="checkbox" id="wmp3" name="srb[wmp3]" value="wmp3"></td><td><input list="reason" name="srb[wmt3]"  id="wmt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp3" name="srb[odp3]" value="odp3"></td><td><input list="reason" name="srb[odt3]"  id="odt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Art</td><td><input type="checkbox" id="arp3" name="srb[arp3]" value="arp3"></td><td><input list="reason" name="srb[art3]"  id="art3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp3" name="srb[eltp3]" value="eltp3"></td><td><input list="reason" name="srb[eltt3]"  id="eltt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp3" name="srb[slp3]" value="slp3"></td><td><input list="reason" name="srb[slt3]"  id="slt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp3" name="srb[dtp3]" value="dtp3"></td><td><input list="reason" name="srb[dtt3]"  id="dtt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp3" name="srb[ictp3]" value="ictp3"></td><td><input list="reason" name="srb[ictt3]"  id="ictt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp3" name="srb[aftp3]" value="aftp3"></td><td><input list="reason" name="srb[aftt3]"  id="aftt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep3" name="srb[hpep3]" value="hpep3"></td><td><input list="reason" name="srb[hpet3]"  id="hpet3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp3" name="srb[cmsp3]" value="cmsp3"></td><td><input list="reason" name="srb[cmst3]"  id="cmst3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-03-table').append('<tr><td>9.10 - 9.50</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp3" name="srb[dmtp3]" value="dmtp3"></td><td><input list="reason" name="srb[dmtt3]"  id="dmtt3" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                    
                });
                
                $('#period-04-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-04-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp4" name="srb[basp4]" value="basp4" ></td><td><input list="reason" name="srb[bast4]"  id="bast4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Geography</td><td><input type="checkbox" id="geop4" name="srb[geop4]" value="geop4" ></td><td><input list="reason" name="srb[geot4]"  id="geot4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Civic Education</td><td><input type="checkbox" id="cep4" name="srb[cep4]" value="cep4"></td><td><input list="reason" name="srb[cet4]"  id="cet4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>French</td><td><input type="checkbox" id="frp4" name="srb[frp4]" value="frp4"></td><td><input list="reason" name="srb[frt4]"  id="frt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Japanese</td><td><input type="checkbox" id="jpp4" name="srb[jpp4]" value="jpp4"></td><td><input list="reason" name="srb[jpt4]"  id="jpt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Korean</td><td><input type="checkbox" id="krp4" name="srb[krp4]" value="krp4"></td><td><input list="reason" name="srb[krt4]"  id="krt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>8.30 - 9.10</td><td>Tamil</td><td><input type="checkbox" id="krp2" name="srb[tap4]" value="tap4"></td><td><input list="reason" name="srb[tat4]"  id="tat4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Oriental Music</td><td><input type="checkbox" id="omp4" name="srb[omp4]" value="omp4"></td><td><input list="reason" name="srb[omt4]"  id="omt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Western Music</td><td><input type="checkbox" id="wmp4" name="srb[wmp4]" value="wmp4"></td><td><input list="reason" name="srb[wmt4]"  id="wmt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp4" name="srb[odp4]" value="odp4"></td><td><input list="reason" name="srb[odt4]"  id="odt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Art</td><td><input type="checkbox" id="arp4" name="srb[arp4]" value="arp4"></td><td><input list="reason" name="srb[art4]"  id="art4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp4" name="srb[eltp4]" value="eltp4"></td><td><input list="reason" name="srb[eltt4]"  id="eltt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp4" name="srb[slp4]" value="slp4"></td><td><input list="reason" name="srb[slt4]"  id="slt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp4" name="srb[dtp4]" value="dtp4"></td><td><input list="reason" name="srb[dtt4]"  id="dtt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp4" name="srb[ictp4]" value="ictp4"></td><td><input list="reason" name="srb[ictt4]"  id="ictt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp4" name="srb[aftp4]" value="aftp4"></td><td><input list="reason" name="srb[aftt4]"  id="aftt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep4" name="srb[hpep4]" value="hpep4"></td><td><input list="reason" name="srb[hpet4]"  id="hpet4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp4" name="srb[cmsp4]" value="cmsp4"></td><td><input list="reason" name="srb[cmst4]"  id="cmst4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-04-table').append('<tr><td>9.50 - 10.30</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp4" name="srb[dmtp4]" value="dmtp4"></td><td><input list="reason" name="srb[dmtt4]"  id="dmtt4" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                    
                });
                
                $('#period-05-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-05-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp5" name="srb[basp5]" value="basp5" ></td><td><input list="reason" name="srb[bast5]"  id="bast5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Geography</td><td><input type="checkbox" id="geop5" name="srb[geop5]" value="geop5" ></td><td><input list="reason" name="srb[geot5]"  id="geot5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Civic Education</td><td><input type="checkbox" id="cep5" name="srb[cep5]" value="cep5"></td><td><input list="reason" name="srb[cet5]"  id="cet5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>French</td><td><input type="checkbox" id="frp5" name="srb[frp5]" value="frp5"></td><td><input list="reason" name="srb[frt5]"  id="frt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Japanese</td><td><input type="checkbox" id="jpp5" name="srb[jpp5]" value="jpp5"></td><td><input list="reason" name="srb[jpt5]"  id="jpt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Korean</td><td><input type="checkbox" id="krp5" name="srb[krp5]" value="krp5"></td><td><input list="reason" name="srb[krt5]"  id="krt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>8.30 - 9.10</td><td>Tamil</td><td><input type="checkbox" id="tap5" name="srb[tap5]" value="tap5"></td><td><input list="reason" name="srb[tat5]"  id="tat5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Oriental Music</td><td><input type="checkbox" id="omp5" name="srb[omp5]" value="omp5"></td><td><input list="reason" name="srb[omt5]"  id="omt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Western Music</td><td><input type="checkbox" id="wmp5" name="srb[wmp5]" value="wmp5"></td><td><input list="reason" name="srb[wmt5]"  id="wmt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp5" name="srb[odp5]" value="odp5"></td><td><input list="reason" name="srb[odt5]"  id="odt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Art</td><td><input type="checkbox" id="arp5" name="srb[arp5]" value="arp5"></td><td><input list="reason" name="srb[art5]"  id="art5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp5" name="srb[eltp5]" value="eltp5"></td><td><input list="reason" name="srb[eltt5]"  id="eltt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp5" name="srb[slp5]" value="slp5"></td><td><input list="reason" name="srb[slt5]"  id="slt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp5" name="srb[dtp5]" value="dtp5"></td><td><input list="reason" name="srb[dtt5]"  id="dtt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp5" name="srb[ictp5]" value="ictp5"></td><td><input list="reason" name="srb[ictt5]"  id="ictt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp5" name="srb[aftp5]" value="aftp5"></td><td><input list="reason" name="srb[aftt5]"  id="aftt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep5" name="srb[hpep5]" value="hpep5"></td><td><input list="reason" name="srb[hpet5]"  id="hpet5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp5" name="srb[cmsp5]" value="cmsp5"></td><td><input list="reason" name="srb[cmst5]"  id="cmst5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-05-table').append('<tr><td>10.50 - 11.30</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp5" name="srb[dmtp5]" value="dmtp5"></td><td><input list="reason" name="srb[dmtt5]"  id="dmtt5" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                    
                });
                
                $('#period-06-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-06-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp6" name="srb[basp6]" value="basp6" ></td><td><input list="reason" name="srb[bast6]"  id="bast6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Geography</td><td><input type="checkbox" id="geop6" name="srb[geop6]" value="geop6" ></td><td><input list="reason" name="srb[geot6]"  id="geot6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Civic Education</td><td><input type="checkbox" id="cep6" name="srb[cep6]" value="cep6"></td><td><input list="reason" name="srb[cet6]"  id="cet6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>French</td><td><input type="checkbox" id="frp6" name="srb[frp6]" value="frp6" ></td><td><input list="reason" name="srb[frt6]"  id="frt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Japanese</td><td><input type="checkbox" id="jpp6" name="srb[jpp6]" value="jpp6"></td><td><input list="reason" name="srb[jpt6]"  id="jpt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Korean</td><td><input type="checkbox" id="krp6" name="srb[krp6]" value="krp6"></td><td><input list="reason" name="srb[krt6]"  id="krt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Tamil</td><td><input type="checkbox" id="krp6" name="srb[tap6]" value="tap6"></td><td><input list="reason" name="srb[tat6]"  id="tat6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Oriental Music</td><td><input type="checkbox" id="omp6" name="srb[omp6]" value="omp6"></td><td><input list="reason" name="srb[omt6]"  id="omt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Western Music</td><td><input type="checkbox" id="wmp6" name="srb[wmp6]" value="wmp6"></td><td><input list="reason" name="srb[wmt6]"  id="wmt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp6" name="srb[odp6]" value="odp6"></td><td><input list="reason" name="srb[odt6]"  id="odt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Art</td><td><input type="checkbox" id="arp6" name="srb[arp6]" value="arp6"></td><td><input list="reason" name="srb[art6]"  id="art6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp6" name="srb[eltp6]" value="eltp6"></td><td><input list="reason" name="srb[eltt6]"  id="eltt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp6" name="srb[slp6]" value="slp6"></td><td><input list="reason" name="srb[slt6]"  id="slt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp6" name="srb[dtp6]" value="dtp6"></td><td><input list="reason" name="srb[dtt6]"  id="dtt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp6" name="srb[ictp6]" value="ictp6"></td><td><input list="reason" name="srb[ictt6]"  id="ictt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp6" name="srb[aftp6]" ></td><td><input list="reason" name="srb[aftt6]"  id="aftt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep6" name="srb[hpep6]" value="hpep6"></td><td><input list="reason" name="srb[hpet6]"  id="hpet6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp6" name="srb[cmsp6]" value="cmsp6"></td><td><input list="reason" name="srb[cmst6]"  id="cmst6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-06-table').append('<tr><td>11.30 - 12.10</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp6" name="srb[dmtp6]" value="dmtp6"></td><td><input list="reason" name="srb[dmtt6]"  id="dmtt6" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                    
                });
                
                $('#period-07-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-07-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp7" name="srb[basp7]" value="basp7" ></td><td><input list="reason" name="srb[bast7]"  id="bast7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Geography</td><td><input type="checkbox" id="geop7" name="srb[geop7]" value="geop7" ></td><td><input list="reason" name="srb[geot7]"  id="geot7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Civic Education</td><td><input type="checkbox" id="cep7" name="srb[cep7]" value="cep7"></td><td><input list="reason" name="srb[cet7]"  id="cet7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>French</td><td><input type="checkbox" id="frp7" name="srb[frp7]" value="frp7"></td><td><input list="reason" name="srb[frt7]"  id="frt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Japanese</td><td><input type="checkbox" id="jpp7" name="srb[jpp7]" value="jpp7"></td><td><input list="reason" name="srb[jpt7]"  id="jpt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Korean</td><td><input type="checkbox" id="krp7" name="srb[krp7]" value="krp7"></td><td><input list="reason" name="srb[krt7]"  id="krt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>11.30 - 12.10</td><td>Tamil</td><td><input type="checkbox" id="krp6" name="srb[tap7]" value="tap7"></td><td><input list="reason" name="srb[tat7]"  id="tat7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Oriental Music</td><td><input type="checkbox" id="omp7" name="srb[omp7]" value="omp7"></td><td><input list="reason" name="srb[omt7]"  id="omt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Western Music</td><td><input type="checkbox" id="wmp7" name="srb[wmp7]" value="wmp7"></td><td><input list="reason" name="srb[wmt7]"  id="wmt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp7" name="srb[odp7]" value="odp7"></td><td><input list="reason" name="srb[odt7]"  id="odt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Art</td><td><input type="checkbox" id="arp7" name="srb[arp7]" value="arp7"></td><td><input list="reason" name="srb[art7]"  id="art7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp7" name="srb[eltp7]" value="eltp7"></td><td><input list="reason" name="srb[eltt7]"  id="eltt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp7" name="srb[slp7]" value="slp7"></td><td><input list="reason" name="srb[slt7]"  id="slt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp7" name="srb[dtp7]" value="dtp7"></td><td><input list="reason" name="srb[dtt7]"  id="dtt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp7" name="srb[ictp7]" value="ictp7"></td><td><input list="reason" name="srb[ictt7]"  id="ictt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp7" name="srb[aftp7]" ></td><td><input list="reason" name="srb[aftt7]"  id="aftt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep7" name="srb[hpep7]" value="hpep7"></td><td><input list="reason" name="srb[hpet7]"  id="hpet7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp7" name="srb[cmsp7]" value="cmsp7"></td><td><input list="reason" name="srb[cmst7]"  id="cmst7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-07-table').append('<tr><td>12.10 - 12.50</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp7" name="srb[dmtp7]" value="dmtp7"></td><td><input list="reason" name="srb[dmtt7]"  id="dmtt7" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                    
                });
                
                $('#period-08-drop-down').on('change', function() {
                    var value = $(this).val();
                
                    $('#period-08-table').empty();
                
                    switch (value) {
                        case "0":
                            break;
                
                        case "17":
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp8" name="srb[basp8]" value="basp8" ></td><td><input list="reason" name="srb[bast8]"  id="bast8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Geography</td><td><input type="checkbox" id="geop8" name="srb[geop8]" value="geop8" ></td><td><input list="reason" name="srb[geot8]"  id="geot8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Civic Education</td><td><input type="checkbox" id="cep8" name="srb[cep8]" value="cep8"></td><td><input list="reason" name="srb[cet8]"  id="cet8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>French</td><td><input type="checkbox" id="frp8" name="srb[frp8]" value="frp8"></td><td><input list="reason" name="srb[frt8]"  id="frt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Japanese</td><td><input type="checkbox" id="jpp8" name="srb[jpp8]" value="jpp8"></td><td><input list="reason" name="srb[jpt8]"  id="jpt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Korean</td><td><input type="checkbox" id="krp8" name="srb[krp8]" value="krp8"></td><td><input list="reason" name="srb[krt8]"  id="krt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>11.30 - 12.10</td><td>Tamil</td><td><input type="checkbox" id="krp6" name="srb[tap8]" value="tap8"></td><td><input list="reason" name="srb[tat8]"  id="tat8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        case "18":
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Oriental Music</td><td><input type="checkbox" id="omp8" name="srb[omp8]" value="omp8"></td><td><input list="reason" name="srb[omt8]"  id="omt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Western Music</td><td><input type="checkbox" id="wmp8" name="srb[wmp8]" value="wmp8"></td><td><input list="reason" name="srb[wmt8]"  id="wmt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp8" name="srb[odp8]" value="odp8"></td><td><input list="reason" name="srb[odt8]"  id="odt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Art</td><td><input type="checkbox" id="arp8" name="srb[arp8]" value="arp8"></td><td><input list="reason" name="srb[art8]"  id="art8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp8" name="srb[eltp8]" value="eltp8"></td><td><input list="reason" name="srb[eltt8]"  id="eltt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp8" name="srb[slp8]" value="slp8"></td><td><input list="reason" name="srb[slt8]"  id="slt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp8" name="srb[dtp8]" value="dtp8"></td><td><input list="reason" name="srb[dtt8]"  id="dtt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                            case "19":
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp8" name="srb[ictp8]" value="ictp8"></td><td><input list="reason" name="srb[ictt8]"  id="ictt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp8" name="srb[aftp8]" value="aftp8"></td><td><input list="reason" name="srb[aftt8]"  id="aftt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep8" name="srb[hpep8]" value="hpep8"></td><td><input list="reason" name="srb[hpet8]"  id="hpet8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 1.30</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp8" name="srb[cmsp8]" value="cmsp8"></td><td><input list="reason" name="srb[cmst8]"  id="cmst8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            $('#period-08-table').append('<tr><td>12.50 - 130</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp8" name="srb[dmtp8]" value="dmtp8"></td><td><input list="reason" name="srb[dmtt8]"  id="dmtt8" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No student follow this subject in this class"></datalist></td></tr>');
                            break;
                
                        default:
                            break;
                    }
                    
                    
                
                
                });
                
                
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


                // period 01 baskets
                ////////////////////////////
                $('#omp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt1").attr("disabled", "disabled");
                        $('#omt1').val('');
                    } else {
                        $("#omt1").removeAttr("disabled"); 
                    }
                });
                $('#wmp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt1").attr("disabled", "disabled");
                        $('#wmt1').val('');
                    } else {
                        $("#wmt1").removeAttr("disabled"); 
                    }
                });
                
                $('#odp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt1").attr("disabled", "disabled");
                        $('#odt1').val('');
                    } else {
                        $("#odt1").removeAttr("disabled"); 
                    }
                });
                
                $('#arp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art1").attr("disabled", "disabled");
                        $('#art1').val('');
                    } else {
                        $("#art1").removeAttr("disabled"); 
                    }
                });
                $('#eltp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt1").attr("disabled", "disabled");
                        $('#eltt1').val('');
                    } else {
                        $("#eltt1").removeAttr("disabled"); 
                    }
                });
                
                $('#slp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt1").attr("disabled", "disabled");
                        $('#slt1').val('');
                    } else {
                        $("#slt1").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt1").attr("disabled", "disabled");
                        $('#dtt1').val('');
                    } else {
                        $("#dtt1").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt1").attr("disabled", "disabled");
                        $('#ictt1').val('');
                    } else {
                        $("#ictt1").removeAttr("disabled"); 
                    }
                });
                $('#aftp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt1").attr("disabled", "disabled");
                        $('#aftt1').val('');
                    } else {
                        $("#aftt1").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet1").attr("disabled", "disabled");
                        $('#hpet1').val('');
                    } else {
                        $("#hpet1").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst1").attr("disabled", "disabled");
                        $('#cmst1').val('');
                    } else {
                        $("#cmst1").removeAttr("disabled"); 
                    }
                });
                $('#dmtp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt1").attr("disabled", "disabled");
                        $('#dmtt1').val('');
                    } else {
                        $("#dmtt1").removeAttr("disabled"); 
                    }
                });

                //textbox disable functions    
                $('#basp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast1").attr("disabled", "disabled");
                        $('#bast1').val('');
                    } else {
                        $("#bast1").removeAttr("disabled"); 
                    }
                });
                $('#geop1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot1").attr("disabled", "disabled");
                        $('#geot1').val('');
                    } else {
                        $("#geot1").removeAttr("disabled"); 
                    }
                });
                
                $('#cep1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet1").attr("disabled", "disabled");
                        $('#cet1').val('');
                    } else {
                        $("#cet1").removeAttr("disabled"); 
                    }
                });
                
                $('#frp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt1").attr("disabled", "disabled");
                        $('#frt1').val('');
                    } else {
                        $("#frt1").removeAttr("disabled"); 
                    }
                });
                $('#jpp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt1").attr("disabled", "disabled");
                        $('#jpt1').val('');
                    } else {
                        $("#jpt1").removeAttr("disabled"); 
                    }
                });
                
                $('#krp1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt1").attr("disabled", "disabled");
                        $('#krt1').val('');
                    } else {
                        $("#krt1").removeAttr("disabled"); 
                    }
                });

                $('#tap1').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat1").attr("disabled", "disabled");
                        $('#tat1').val('');
                    } else {
                        $("#tat1").removeAttr("disabled"); 
                    }
                });
                
                //textbox clear functions
                $('#bast1').click(function() {
                
                        $('#bast1').val('');
                
                });
                
                $('#geot1').click(function() {
                
                        $('#geot1').val('');
                
                });
                
                $('#cet1').click(function() {
                
                        $('#cet1').val('');
                
                });
                
                $('#frt1').click(function() {
                
                        $('#frt1').val('');
                
                });
                
                $('#jpt1').click(function() {
                
                        $('#jpt1').val('');
                
                });
                
                $('#krt1').click(function() {
                
                        $('#krt1').val('');
                
                });
                
                $('#tat1').click(function() {
                
                    $('#tat1').val('');
            
                });

                $('#omt1').click(function() {
                
                        $('#omt1').val('');
                
                });
                
                $('#wmt1').click(function() {
                
                        $('#wmt1').val('');
                
                });
                
                $('#odt1').click(function() {
                
                        $('#odt1').val('');
                
                });
                
                $('#art1').click(function() {
                
                        $('#art1').val('');
                
                });
                
                $('#eltt1').click(function() {
                
                        $('#eltt1').val('');
                
                });
                
                $('#slt1').click(function() {
                
                        $('#slt1').val('');
                
                });
                
                $('#dtt1').click(function() {
                
                        $('#dtt1').val('');
                
                });
                
                
                $('#ictt1').click(function() {
                
                        $('#ictt1').val('');
                
                });
                
                $('#aftt1').click(function() {
                
                        $('#aftt1').val('');
                
                });
                
                $('#hpet1').click(function() {
                
                        $('#hpet1').val('');
                
                });
                
                $('#cmst1').click(function() {
                
                        $('#cmst1').val('');
                
                });
                
                $('#dmtt1').click(function() {
                
                        $('#dmtt1').val('');
                
                });


                // period 02 baskets
                /////////////////////////////
                $('#basp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast2").attr("disabled", "disabled");
                        $('#bast2').val('');
                    } else {
                        $("#bast2").removeAttr("disabled"); 
                    }
                });
                $('#geop2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot2").attr("disabled", "disabled");
                        $('#geot2').val('');
                    } else {
                        $("#geot2").removeAttr("disabled"); 
                    }
                });
                
                $('#cep2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet2").attr("disabled", "disabled");
                        $('#cet2').val('');
                    } else {
                        $("#cet2").removeAttr("disabled"); 
                    }
                });
                
                $('#frp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt2").attr("disabled", "disabled");
                        $('#frt2').val('');
                    } else {
                        $("#frt2").removeAttr("disabled"); 
                    }
                });
                $('#jpp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt2").attr("disabled", "disabled");
                        $('#jpt2').val('');
                    } else {
                        $("#jpt2").removeAttr("disabled"); 
                    }
                });
                
                $('#krp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt2").attr("disabled", "disabled");
                        $('#krt2').val('');
                    } else {
                        $("#krt2").removeAttr("disabled"); 
                    }
                });

                $('#tap2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat2").attr("disabled", "disabled");
                        $('#tat2').val('');
                    } else {
                        $("#tat2").removeAttr("disabled"); 
                    }
                });
                
                $('#omp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt2").attr("disabled", "disabled");
                        $('#omt2').val('');
                    } else {
                        $("#omt2").removeAttr("disabled"); 
                    }
                });
                $('#wmp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt2").attr("disabled", "disabled");
                        $('#wmt2').val('');
                    } else {
                        $("#wmt2").removeAttr("disabled"); 
                    }
                });
                
                $('#odp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt2").attr("disabled", "disabled");
                        $('#odt2').val('');
                    } else {
                        $("#odt2").removeAttr("disabled"); 
                    }
                });
                
                $('#arp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art2").attr("disabled", "disabled");
                        $('#art2').val('');
                    } else {
                        $("#art2").removeAttr("disabled"); 
                    }
                });
                $('#eltp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt2").attr("disabled", "disabled");
                        $('#eltt2').val('');
                    } else {
                        $("#eltt2").removeAttr("disabled"); 
                    }
                });
                
                $('#slp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt2").attr("disabled", "disabled");
                        $('#slt2').val('');
                    } else {
                        $("#slt2").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt2").attr("disabled", "disabled");
                        $('#dtt2').val('');
                    } else {
                        $("#dtt2").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt2").attr("disabled", "disabled");
                        $('#ictt2').val('');
                    } else {
                        $("#ictt2").removeAttr("disabled"); 
                    }
                });
                $('#aftp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt2").attr("disabled", "disabled");
                        $('#aftt2').val('');
                    } else {
                        $("#aftt2").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet2").attr("disabled", "disabled");
                        $('#hpet2').val('');
                    } else {
                        $("#hpet2").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst2").attr("disabled", "disabled");
                        $('#cmst2').val('');
                    } else {
                        $("#cmst2").removeAttr("disabled"); 
                    }
                });
                $('#dmtp2').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt2").attr("disabled", "disabled");
                        $('#dmtt2').val('');
                    } else {
                        $("#dmtt2").removeAttr("disabled"); 
                    }
                });
                
                $('#bast2').click(function() {
                
                        $('#bast2').val('');
                
                });
                
                $('#geot2').click(function() {
                
                        $('#geot2').val('');
                
                });
                
                $('#cet2').click(function() {
                
                        $('#cet2').val('');
                
                });
                
                $('#frt2').click(function() {
                
                        $('#frt2').val('');
                
                });
                
                $('#jpt2').click(function() {
                
                        $('#jpt2').val('');
                
                });
                
                $('#krt2').click(function() {
                
                        $('#krt2').val('');
                
                });

                $('#tat2').click(function() {
                
                    $('#tat2').val('');
            
                });
                
                $('#omt2').click(function() {
                
                        $('#omt2').val('');
                
                });
                
                $('#wmt2').click(function() {
                
                        $('#wmt2').val('');
                
                });
                
                $('#odt2').click(function() {
                
                        $('#odt2').val('');
                
                });
                
                $('#art2').click(function() {
                
                        $('#art2').val('');
                
                });
                
                $('#eltt2').click(function() {
                
                        $('#eltt2').val('');
                
                });
                
                $('#slt2').click(function() {
                
                        $('#slt2').val('');
                
                });
                
                $('#dtt2').click(function() {
                
                        $('#dtt2').val('');
                
                });
                
                
                $('#ictt2').click(function() {
                
                        $('#ictt2').val('');
                
                });
                
                $('#aftt2').click(function() {
                
                        $('#aftt2').val('');
                
                });
                
                $('#hpet2').click(function() {
                
                        $('#hpet2').val('');
                
                });
                
                $('#cmst2').click(function() {
                
                        $('#cmst2').val('');
                
                });
                
                $('#dmtt2').click(function() {
                
                        $('#dmtt2').val('');
                
                });


                ////period 03 baskets
                ////////////////////////////
                $('#basp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast3").attr("disabled", "disabled");
                        $('#bast3').val('');
                    } else {
                        $("#bast3").removeAttr("disabled"); 
                    }
                });
                $('#geop3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot3").attr("disabled", "disabled");
                        $('#geot3').val('');
                    } else {
                        $("#geot3").removeAttr("disabled"); 
                    }
                });
                
                $('#cep3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet3").attr("disabled", "disabled");
                        $('#cet3').val('');
                    } else {
                        $("#cet3").removeAttr("disabled"); 
                    }
                });
                
                $('#frp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt3").attr("disabled", "disabled");
                        $('#frt3').val('');
                    } else {
                        $("#frt3").removeAttr("disabled"); 
                    }
                });
                $('#jpp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt3").attr("disabled", "disabled");
                        $('#jpt3').val('');
                    } else {
                        $("#jpt3").removeAttr("disabled"); 
                    }
                });
                
                $('#krp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt3").attr("disabled", "disabled");
                        $('#krt3').val('');
                    } else {
                        $("#krt3").removeAttr("disabled"); 
                    }
                });

                $('#tap4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat4").attr("disabled", "disabled");
                        $('#tat4').val('');
                    } else {
                        $("#tat4").removeAttr("disabled"); 
                    }
                });
                
                $('#omp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt3").attr("disabled", "disabled");
                        $('#omt3').val('');
                    } else {
                        $("#omt3").removeAttr("disabled"); 
                    }
                });
                $('#wmp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt3").attr("disabled", "disabled");
                        $('#wmt3').val('');
                    } else {
                        $("#wmt3").removeAttr("disabled"); 
                    }
                });
                
                $('#odp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt3").attr("disabled", "disabled");
                        $('#odt3').val('');
                    } else {
                        $("#odt3").removeAttr("disabled"); 
                    }
                });
                
                $('#arp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art3").attr("disabled", "disabled");
                        $('#art3').val('');
                    } else {
                        $("#art3").removeAttr("disabled"); 
                    }
                });
                $('#eltp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt3").attr("disabled", "disabled");
                        $('#eltt3').val('');
                    } else {
                        $("#eltt3").removeAttr("disabled"); 
                    }
                });
                
                $('#slp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt3").attr("disabled", "disabled");
                        $('#slt3').val('');
                    } else {
                        $("#slt3").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt3").attr("disabled", "disabled");
                        $('#dtt3').val('');
                    } else {
                        $("#dtt3").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt3").attr("disabled", "disabled");
                        $('#ictt3').val('');
                    } else {
                        $("#ictt3").removeAttr("disabled"); 
                    }
                });
                $('#aftp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt3").attr("disabled", "disabled");
                        $('#aftt3').val('');
                    } else {
                        $("#aftt3").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet3").attr("disabled", "disabled");
                        $('#hpet3').val('');
                    } else {
                        $("#hpet3").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst3").attr("disabled", "disabled");
                        $('#cmst3').val('');
                    } else {
                        $("#cmst3").removeAttr("disabled"); 
                    }
                });
                $('#dmtp3').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt3").attr("disabled", "disabled");
                        $('#dmtt3').val('');
                    } else {
                        $("#dmtt3").removeAttr("disabled"); 
                    }
                });
                
                $('#bast3').click(function() {
                
                        $('#bast3').val('');
                
                });
                
                $('#geot3').click(function() {
                
                        $('#geot3').val('');
                
                });
                
                $('#cet3').click(function() {
                
                        $('#cet3').val('');
                
                });
                
                $('#frt3').click(function() {
                
                        $('#frt3').val('');
                
                });
                
                $('#jpt3').click(function() {
                
                        $('#jpt3').val('');
                
                });
                
                $('#krt3').click(function() {
                
                        $('#krt3').val('');
                
                });

                $('#tat3').click(function() {
                
                    $('#tat3').val('');
            
                });
                
                $('#omt3').click(function() {
                
                        $('#omt3').val('');
                
                });
                
                $('#wmt3').click(function() {
                
                        $('#wmt3').val('');
                
                });
                
                $('#odt3').click(function() {
                
                        $('#odt3').val('');
                
                });
                
                $('#art3').click(function() {
                
                        $('#art3').val('');
                
                });
                
                $('#eltt3').click(function() {
                
                        $('#eltt3').val('');
                
                });
                
                $('#slt3').click(function() {
                
                        $('#slt3').val('');
                
                });
                
                $('#dtt3').click(function() {
                
                        $('#dtt3').val('');
                
                });
                
                
                $('#ictt3').click(function() {
                
                        $('#ictt3').val('');
                
                });
                
                $('#aftt3').click(function() {
                
                        $('#aftt3').val('');
                
                });
                
                $('#hpet3').click(function() {
                
                        $('#hpet3').val('');
                
                });
                
                $('#cmst3').click(function() {
                
                        $('#cmst3').val('');
                
                });
                
                $('#dmtt3').click(function() {
                
                        $('#dmtt3').val('');
                
                });


                /// period 04 baskets
                ////////////////////////
                $('#basp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast4").attr("disabled", "disabled");
                        $('#bast4').val('');
                    } else {
                        $("#bast4").removeAttr("disabled"); 
                    }
                });
                $('#geop4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot4").attr("disabled", "disabled");
                        $('#geot4').val('');
                    } else {
                        $("#geot4").removeAttr("disabled"); 
                    }
                });
                
                $('#cep4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet4").attr("disabled", "disabled");
                        $('#cet4').val('');
                    } else {
                        $("#cet4").removeAttr("disabled"); 
                    }
                });
                
                $('#frp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt4").attr("disabled", "disabled");
                        $('#frt4').val('');
                    } else {
                        $("#frt4").removeAttr("disabled"); 
                    }
                });
                $('#jpp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt4").attr("disabled", "disabled");
                        $('#jpt4').val('');
                    } else {
                        $("#jpt4").removeAttr("disabled"); 
                    }
                });
                
                $('#krp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt4").attr("disabled", "disabled");
                        $('#krt4').val('');
                    } else {
                        $("#krt4").removeAttr("disabled"); 
                    }
                });
                
                $('#tap4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat4").attr("disabled", "disabled");
                        $('#tat4').val('');
                    } else {
                        $("#tat4").removeAttr("disabled"); 
                    }
                });

                $('#omp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt4").attr("disabled", "disabled");
                        $('#omt4').val('');
                    } else {
                        $("#omt4").removeAttr("disabled"); 
                    }
                });
                $('#wmp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt4").attr("disabled", "disabled");
                        $('#wmt4').val('');
                    } else {
                        $("#wmt4").removeAttr("disabled"); 
                    }
                });
                
                $('#odp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt4").attr("disabled", "disabled");
                        $('#odt4').val('');
                    } else {
                        $("#odt4").removeAttr("disabled"); 
                    }
                });
                
                $('#arp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art4").attr("disabled", "disabled");
                        $('#art4').val('');
                    } else {
                        $("#art4").removeAttr("disabled"); 
                    }
                });
                $('#eltp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt4").attr("disabled", "disabled");
                        $('#eltt4').val('');
                    } else {
                        $("#eltt4").removeAttr("disabled"); 
                    }
                });
                
                $('#slp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt4").attr("disabled", "disabled");
                        $('#slt4').val('');
                    } else {
                        $("#slt4").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt4").attr("disabled", "disabled");
                        $('#dtt4').val('');
                    } else {
                        $("#dtt4").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt4").attr("disabled", "disabled");
                        $('#ictt4').val('');
                    } else {
                        $("#ictt4").removeAttr("disabled"); 
                    }
                });
                $('#aftp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt4").attr("disabled", "disabled");
                        $('#aftt4').val('');
                    } else {
                        $("#aftt4").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet4").attr("disabled", "disabled");
                        $('#hpet4').val('');
                    } else {
                        $("#hpet4").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst4").attr("disabled", "disabled");
                        $('#cmst4').val('');
                    } else {
                        $("#cmst4").removeAttr("disabled"); 
                    }
                });
                $('#dmtp4').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt4").attr("disabled", "disabled");
                        $('#dmtt4').val('');
                    } else {
                        $("#dmtt4").removeAttr("disabled"); 
                    }
                });
                
                $('#bast4').click(function() {
                
                        $('#bast4').val('');
                
                });
                
                $('#geot4').click(function() {
                
                        $('#geot4').val('');
                
                });
                
                $('#cet4').click(function() {
                
                        $('#cet4').val('');
                
                });
                
                $('#frt4').click(function() {
                
                        $('#frt4').val('');
                
                });
                
                $('#jpt4').click(function() {
                
                        $('#jpt4').val('');
                
                });
                
                $('#krt4').click(function() {
                
                        $('#krt4').val('');
                
                });

                $('#tat4').click(function() {
                
                    $('#tat4').val('');
            
                });
                
                $('#omt4').click(function() {
                
                        $('#omt4').val('');
                
                });
                
                $('#wmt4').click(function() {
                
                        $('#wmt4').val('');
                
                });
                
                $('#odt4').click(function() {
                
                        $('#odt4').val('');
                
                });
                
                $('#art4').click(function() {
                
                        $('#art4').val('');
                
                });
                
                $('#eltt4').click(function() {
                
                        $('#eltt4').val('');
                
                });
                
                $('#slt4').click(function() {
                
                        $('#slt4').val('');
                
                });
                
                $('#dtt4').click(function() {
                
                        $('#dtt4').val('');
                
                });
                
                
                $('#ictt4').click(function() {
                
                        $('#ictt4').val('');
                
                });
                
                $('#aftt4').click(function() {
                
                        $('#aftt4').val('');
                
                });
                
                $('#hpet4').click(function() {
                
                        $('#hpet4').val('');
                
                });
                
                $('#cmst4').click(function() {
                
                        $('#cmst4').val('');
                
                });
                
                $('#dmtt4').click(function() {
                
                        $('#dmtt4').val('');
                
                });


                // period 05 baskets
                ///////////////////////////
                $('#basp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast5").attr("disabled", "disabled");
                        $('#bast5').val('');
                    } else {
                        $("#bast5").removeAttr("disabled"); 
                    }
                });
                $('#geop5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot5").attr("disabled", "disabled");
                        $('#geot5').val('');
                    } else {
                        $("#geot5").removeAttr("disabled"); 
                    }
                });
                
                $('#cep5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet5").attr("disabled", "disabled");
                        $('#cet5').val('');
                    } else {
                        $("#cet5").removeAttr("disabled"); 
                    }
                });
                
                $('#frp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt5").attr("disabled", "disabled");
                        $('#frt5').val('');
                    } else {
                        $("#frt5").removeAttr("disabled"); 
                    }
                });
                $('#jpp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt5").attr("disabled", "disabled");
                        $('#jpt5').val('');
                    } else {
                        $("#jpt5").removeAttr("disabled"); 
                    }
                });
                
                $('#krp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt5").attr("disabled", "disabled");
                        $('#krt5').val('');
                    } else {
                        $("#krt5").removeAttr("disabled"); 
                    }
                });

                $('#tap5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat5").attr("disabled", "disabled");
                        $('#tat5').val('');
                    } else {
                        $("#tat5").removeAttr("disabled"); 
                    }
                });
                
                $('#omp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt5").attr("disabled", "disabled");
                        $('#omt5').val('');
                    } else {
                        $("#omt5").removeAttr("disabled"); 
                    }
                });
                $('#wmp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt5").attr("disabled", "disabled");
                        $('#wmt5').val('');
                    } else {
                        $("#wmt5").removeAttr("disabled"); 
                    }
                });
                
                $('#odp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt5").attr("disabled", "disabled");
                        $('#odt5').val('');
                    } else {
                        $("#odt5").removeAttr("disabled"); 
                    }
                });
                
                $('#arp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art5").attr("disabled", "disabled");
                        $('#art5').val('');
                    } else {
                        $("#art5").removeAttr("disabled"); 
                    }
                });
                $('#eltp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt5").attr("disabled", "disabled");
                        $('#eltt5').val('');
                    } else {
                        $("#eltt5").removeAttr("disabled"); 
                    }
                });
                
                $('#slp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt5").attr("disabled", "disabled");
                        $('#slt5').val('');
                    } else {
                        $("#slt5").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt5").attr("disabled", "disabled");
                        $('#dtt5').val('');
                    } else {
                        $("#dtt5").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt5").attr("disabled", "disabled");
                        $('#ictt5').val('');
                    } else {
                        $("#ictt5").removeAttr("disabled"); 
                    }
                });
                $('#aftp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt5").attr("disabled", "disabled");
                        $('#aftt5').val('');
                    } else {
                        $("#aftt5").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet5").attr("disabled", "disabled");
                        $('#hpet5').val('');
                    } else {
                        $("#hpet5").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst5").attr("disabled", "disabled");
                        $('#cmst5').val('');
                    } else {
                        $("#cmst5").removeAttr("disabled"); 
                    }
                });
                $('#dmtp5').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt5").attr("disabled", "disabled");
                        $('#dmtt5').val('');
                    } else {
                        $("#dmtt5").removeAttr("disabled"); 
                    }
                });
                
                $('#bast5').click(function() {
                
                        $('#bast5').val('');
                
                });
                
                $('#geot5').click(function() {
                
                        $('#geot5').val('');
                
                });
                
                $('#cet5').click(function() {
                
                        $('#cet5').val('');
                
                });
                
                $('#frt5').click(function() {
                
                        $('#frt5').val('');
                
                });
                
                $('#jpt5').click(function() {
                
                        $('#jpt5').val('');
                
                });
                
                $('#krt5').click(function() {
                
                        $('#krt5').val('');
                
                });

                $('#tat5').click(function() {
                
                    $('#tat5').val('');
            
                });
                
                $('#omt5').click(function() {
                
                        $('#omt5').val('');
                
                });
                
                $('#wmt5').click(function() {
                
                        $('#wmt5').val('');
                
                });
                
                $('#odt5').click(function() {
                
                        $('#odt5').val('');
                
                });
                
                $('#art5').click(function() {
                
                        $('#art5').val('');
                
                });
                
                $('#eltt5').click(function() {
                
                        $('#eltt5').val('');
                
                });
                
                $('#slt5').click(function() {
                
                        $('#slt5').val('');
                
                });
                
                $('#dtt5').click(function() {
                
                        $('#dtt5').val('');
                
                });
                
                
                $('#ictt5').click(function() {
                
                        $('#ictt5').val('');
                
                });
                
                $('#aftt5').click(function() {
                
                        $('#aftt5').val('');
                
                });
                
                $('#hpet5').click(function() {
                
                        $('#hpet5').val('');
                
                });
                
                $('#cmst5').click(function() {
                
                        $('#cmst5').val('');
                
                });
                
                $('#dmtt5').click(function() {
                
                        $('#dmtt5').val('');
                
                });


                /// period 06 baskets
                ////////////////////////////////////
                
                $('#basp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast6").attr("disabled", "disabled");
                        $('#bast6').val('');
                    } else {
                        $("#bast6").removeAttr("disabled"); 
                    }
                });
                $('#geop6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot6").attr("disabled", "disabled");
                        $('#geot6').val('');
                    } else {
                        $("#geot6").removeAttr("disabled"); 
                    }
                });
                
                $('#cep6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet6").attr("disabled", "disabled");
                        $('#cet6').val('');
                    } else {
                        $("#cet6").removeAttr("disabled"); 
                    }
                });
                
                $('#frp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt6").attr("disabled", "disabled");
                        $('#frt6').val('');
                    } else {
                        $("#frt6").removeAttr("disabled"); 
                    }
                });
                $('#jpp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt6").attr("disabled", "disabled");
                        $('#jpt6').val('');
                    } else {
                        $("#jpt6").removeAttr("disabled"); 
                    }
                });
                
                $('#krp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt6").attr("disabled", "disabled");
                        $('#krt6').val('');
                    } else {
                        $("#krt6").removeAttr("disabled"); 
                    }
                });
                
                $('#tap6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat6").attr("disabled", "disabled");
                        $('#tat6').val('');
                    } else {
                        $("#tat6").removeAttr("disabled"); 
                    }
                });

                $('#omp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt6").attr("disabled", "disabled");
                        $('#omt6').val('');
                    } else {
                        $("#omt6").removeAttr("disabled"); 
                    }
                });
                $('#wmp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt6").attr("disabled", "disabled");
                        $('#wmt6').val('');
                    } else {
                        $("#wmt6").removeAttr("disabled"); 
                    }
                });
                
                $('#odp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt6").attr("disabled", "disabled");
                        $('#odt6').val('');
                    } else {
                        $("#odt6").removeAttr("disabled"); 
                    }
                });
                
                $('#arp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art6").attr("disabled", "disabled");
                        $('#art6').val('');
                    } else {
                        $("#art6").removeAttr("disabled"); 
                    }
                });
                $('#eltp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt6").attr("disabled", "disabled");
                        $('#eltt6').val('');
                    } else {
                        $("#eltt6").removeAttr("disabled"); 
                    }
                });
                
                $('#slp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt6").attr("disabled", "disabled");
                        $('#slt6').val('');
                    } else {
                        $("#slt6").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt6").attr("disabled", "disabled");
                        $('#dtt6').val('');
                    } else {
                        $("#dtt6").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt6").attr("disabled", "disabled");
                        $('#ictt6').val('');
                    } else {
                        $("#ictt6").removeAttr("disabled"); 
                    }
                });
                $('#aftp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt6").attr("disabled", "disabled");
                        $('#aftt6').val('');
                    } else {
                        $("#aftt6").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet6").attr("disabled", "disabled");
                        $('#hpet6').val('');
                    } else {
                        $("#hpet6").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst6").attr("disabled", "disabled");
                        $('#cmst6').val('');
                    } else {
                        $("#cmst6").removeAttr("disabled"); 
                    }
                });
                $('#dmtp6').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt6").attr("disabled", "disabled");
                        $('#dmtt6').val('');
                    } else {
                        $("#dmtt6").removeAttr("disabled"); 
                    }
                });
                
                $('#bast6').click(function() {
                
                        $('#bast6').val('');
                
                });
                
                $('#geot6').click(function() {
                
                        $('#geot6').val('');
                
                });
                
                $('#cet6').click(function() {
                
                        $('#cet6').val('');
                
                });
                
                $('#frt6').click(function() {
                
                        $('#frt6').val('');
                
                });
                
                $('#jpt6').click(function() {
                
                        $('#jpt6').val('');
                
                });
                
                $('#krt6').click(function() {
                
                        $('#krt6').val('');
                
                });
                
                $('#tat6').click(function() {
                
                    $('#tat6').val('');
            
                });

                $('#omt6').click(function() {
                
                        $('#omt6').val('');
                
                });
                
                $('#wmt6').click(function() {
                
                        $('#wmt6').val('');
                
                });
                
                $('#odt6').click(function() {
                
                        $('#odt6').val('');
                
                });
                
                $('#art6').click(function() {
                
                        $('#art6').val('');
                
                });
                
                $('#eltt6').click(function() {
                
                        $('#eltt6').val('');
                
                });
                
                $('#slt6').click(function() {
                
                        $('#slt6').val('');
                
                });
                
                $('#dtt6').click(function() {
                
                        $('#dtt6').val('');
                
                });
                
                
                $('#ictt6').click(function() {
                
                        $('#ictt6').val('');
                
                });
                
                $('#aftt6').click(function() {
                
                        $('#aftt6').val('');
                
                });
                
                $('#hpet6').click(function() {
                
                        $('#hpet6').val('');
                
                });
                
                $('#cmst6').click(function() {
                
                        $('#cmst6').val('');
                
                });
                
                $('#dmtt6').click(function() {
                
                        $('#dmtt6').val('');
                
                });


                /// period 07 bskets
                ////////////////////////
                $('#basp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast7").attr("disabled", "disabled");
                        $('#bast7').val('');
                    } else {
                        $("#bast7").removeAttr("disabled"); 
                    }
                });
                $('#geop7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot7").attr("disabled", "disabled");
                        $('#geot7').val('');
                    } else {
                        $("#geot7").removeAttr("disabled"); 
                    }
                });
                
                $('#cep7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet7").attr("disabled", "disabled");
                        $('#cet7').val('');
                    } else {
                        $("#cet7").removeAttr("disabled"); 
                    }
                });
                
                $('#frp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt7").attr("disabled", "disabled");
                        $('#frt7').val('');
                    } else {
                        $("#frt7").removeAttr("disabled"); 
                    }
                });
                $('#jpp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt7").attr("disabled", "disabled");
                        $('#jpt7').val('');
                    } else {
                        $("#jpt7").removeAttr("disabled"); 
                    }
                });
                
                $('#krp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt7").attr("disabled", "disabled");
                        $('#krt7').val('');
                    } else {
                        $("#krt7").removeAttr("disabled"); 
                    }
                });

                $('#tap7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat7").attr("disabled", "disabled");
                        $('#tat7').val('');
                    } else {
                        $("#tat7").removeAttr("disabled"); 
                    }
                });
                
                $('#omp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt7").attr("disabled", "disabled");
                        $('#omt7').val('');
                    } else {
                        $("#omt7").removeAttr("disabled"); 
                    }
                });
                $('#wmp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt7").attr("disabled", "disabled");
                        $('#wmt7').val('');
                    } else {
                        $("#wmt7").removeAttr("disabled"); 
                    }
                });
                
                $('#odp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt7").attr("disabled", "disabled");
                        $('#odt7').val('');
                    } else {
                        $("#odt7").removeAttr("disabled"); 
                    }
                });
                
                $('#arp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art7").attr("disabled", "disabled");
                        $('#art7').val('');
                    } else {
                        $("#art7").removeAttr("disabled"); 
                    }
                });
                $('#eltp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt7").attr("disabled", "disabled");
                        $('#eltt7').val('');
                    } else {
                        $("#eltt7").removeAttr("disabled"); 
                    }
                });
                
                $('#slp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt7").attr("disabled", "disabled");
                        $('#slt7').val('');
                    } else {
                        $("#slt7").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt7").attr("disabled", "disabled");
                        $('#dtt7').val('');
                    } else {
                        $("#dtt7").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt7").attr("disabled", "disabled");
                        $('#ictt7').val('');
                    } else {
                        $("#ictt7").removeAttr("disabled"); 
                    }
                });
                $('#aftp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt7").attr("disabled", "disabled");
                        $('#aftt7').val('');
                    } else {
                        $("#aftt7").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet7").attr("disabled", "disabled");
                        $('#hpet7').val('');
                    } else {
                        $("#hpet7").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst7").attr("disabled", "disabled");
                        $('#cmst7').val('');
                    } else {
                        $("#cmst7").removeAttr("disabled"); 
                    }
                });
                $('#dmtp7').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt7").attr("disabled", "disabled");
                        $('#dmtt7').val('');
                    } else {
                        $("#dmtt7").removeAttr("disabled"); 
                    }
                });
                
                $('#bast7').click(function() {
                
                        $('#bast7').val('');
                
                });
                
                $('#geot7').click(function() {
                
                        $('#geot7').val('');
                
                });
                
                $('#cet7').click(function() {
                
                        $('#cet7').val('');
                
                });
                
                $('#frt7').click(function() {
                
                        $('#frt7').val('');
                
                });
                
                $('#jpt7').click(function() {
                
                        $('#jpt7').val('');
                
                });
                
                $('#krt7').click(function() {
                
                        $('#krt7').val('');
                
                });
                
                $('#tat7').click(function() {
                
                    $('#tat7').val('');
            
                });

                $('#omt7').click(function() {
                
                        $('#omt7').val('');
                
                });
                
                $('#wmt7').click(function() {
                
                        $('#wmt7').val('');
                
                });
                
                $('#odt7').click(function() {
                
                        $('#odt7').val('');
                
                });
                
                $('#art7').click(function() {
                
                        $('#art7').val('');
                
                });
                
                $('#eltt7').click(function() {
                
                        $('#eltt7').val('');
                
                });
                
                $('#slt7').click(function() {
                
                        $('#slt7').val('');
                
                });
                
                $('#dtt7').click(function() {
                
                        $('#dtt7').val('');
                
                });
                
                
                $('#ictt7').click(function() {
                
                        $('#ictt7').val('');
                
                });
                
                $('#aftt7').click(function() {
                
                        $('#aftt7').val('');
                
                });
                
                $('#hpet7').click(function() {
                
                        $('#hpet7').val('');
                
                });
                
                $('#cmst7').click(function() {
                
                        $('#cmst7').val('');
                
                });
                
                $('#dmtt7').click(function() {
                
                        $('#dmtt7').val('');
                
                });

                /// period 08 baskets
                ////////////////////////
                $('#basp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#bast8").attr("disabled", "disabled");
                        $('#bast8').val('');
                    } else {
                        $("#bast8").removeAttr("disabled"); 
                    }
                });
                $('#geop8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#geot8").attr("disabled", "disabled");
                        $('#geot8').val('');
                    } else {
                        $("#geot8").removeAttr("disabled"); 
                    }
                });
                
                $('#cep8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cet8").attr("disabled", "disabled");
                        $('#cet8').val('');
                    } else {
                        $("#cet8").removeAttr("disabled"); 
                    }
                });
                
                $('#frp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#frt8").attr("disabled", "disabled");
                        $('#frt8').val('');
                    } else {
                        $("#frt8").removeAttr("disabled"); 
                    }
                });
                $('#jpp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#jpt8").attr("disabled", "disabled");
                        $('#jpt8').val('');
                    } else {
                        $("#jpt8").removeAttr("disabled"); 
                    }
                });
                
                $('#krp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#krt8").attr("disabled", "disabled");
                        $('#krt8').val('');
                    } else {
                        $("#krt8").removeAttr("disabled"); 
                    }
                });

                $('#tap8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#tat8").attr("disabled", "disabled");
                        $('#tat8').val('');
                    } else {
                        $("#tat8").removeAttr("disabled"); 
                    }
                });
                
                $('#omp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#omt8").attr("disabled", "disabled");
                        $('#omt8').val('');
                    } else {
                        $("#omt8").removeAttr("disabled"); 
                    }
                });
                $('#wmp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#wmt8").attr("disabled", "disabled");
                        $('#wmt8').val('');
                    } else {
                        $("#wmt8").removeAttr("disabled"); 
                    }
                });
                
                $('#odp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#odt8").attr("disabled", "disabled");
                        $('#odt8').val('');
                    } else {
                        $("#odt8").removeAttr("disabled"); 
                    }
                });
                
                $('#arp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#art8").attr("disabled", "disabled");
                        $('#art8').val('');
                    } else {
                        $("#art8").removeAttr("disabled"); 
                    }
                });
                $('#eltp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#eltt8").attr("disabled", "disabled");
                        $('#eltt8').val('');
                    } else {
                        $("#eltt8").removeAttr("disabled"); 
                    }
                });
                
                $('#slp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#slt8").attr("disabled", "disabled");
                        $('#slt8').val('');
                    } else {
                        $("#slt8").removeAttr("disabled"); 
                    }
                });
                
                $('#dtp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dtt8").attr("disabled", "disabled");
                        $('#dtt8').val('');
                    } else {
                        $("#dtt8").removeAttr("disabled"); 
                    }
                });
                
                $('#ictp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#ictt8").attr("disabled", "disabled");
                        $('#ictt8').val('');
                    } else {
                        $("#ictt8").removeAttr("disabled"); 
                    }
                });
                $('#aftp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#aftt8").attr("disabled", "disabled");
                        $('#aftt8').val('');
                    } else {
                        $("#aftt8").removeAttr("disabled"); 
                    }
                });
                
                $('#hpep8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#hpet8").attr("disabled", "disabled");
                        $('#hpet8').val('');
                    } else {
                        $("#hpet8").removeAttr("disabled"); 
                    }
                });
                
                $('#cmsp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#cmst8").attr("disabled", "disabled");
                        $('#cmst8').val('');
                    } else {
                        $("#cmst8").removeAttr("disabled"); 
                    }
                });
                $('#dmtp8').change(function() {
                    if($(this).is(":checked")) {
                        //alert ("The element with id " + this.id + " changed.");
                        $("#dmtt8").attr("disabled", "disabled");
                        $('#dmtt8').val('');
                    } else {
                        $("#dmtt8").removeAttr("disabled"); 
                    }
                });
                
                $('#bast8').click(function() {
                
                        $('#bast8').val('');
                
                });
                
                $('#geot8').click(function() {
                
                        $('#geot8').val('');
                
                });
                
                $('#cet8').click(function() {
                
                        $('#cet8').val('');
                
                });
                
                $('#frt8').click(function() {
                
                        $('#frt8').val('');
                
                });
                
                $('#jpt8').click(function() {
                
                        $('#jpt8').val('');
                
                });
                
                $('#krt8').click(function() {
                
                        $('#krt8').val('');
                
                });

                $('#tat8').click(function() {
                
                    $('#tat8').val('');
            
                });
                
                $('#omt8').click(function() {
                
                        $('#omt8').val('');
                
                });
                
                $('#wmt8').click(function() {
                
                        $('#wmt8').val('');
                
                });
                
                $('#odt8').click(function() {
                
                        $('#odt8').val('');
                
                });
                
                $('#art8').click(function() {
                
                        $('#art8').val('');
                
                });
                
                $('#eltt8').click(function() {
                
                        $('#eltt8').val('');
                
                });
                
                $('#slt8').click(function() {
                
                        $('#slt8').val('');
                
                });
                
                $('#dtt8').click(function() {
                
                        $('#dtt8').val('');
                
                });
                
                
                $('#ictt8').click(function() {
                
                        $('#ictt8').val('');
                
                });
                
                $('#aftt8').click(function() {
                
                        $('#aftt8').val('');
                
                });
                
                $('#hpet8').click(function() {
                
                        $('#hpet8').val('');
                
                });
                
                $('#cmst8').click(function() {
                
                        $('#cmst8').val('');
                
                });
                
                $('#dmtt8').click(function() {
                
                        $('#dmtt8').val('');
                
                });

                // end of file
});
                