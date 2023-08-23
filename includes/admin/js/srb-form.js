jQuery( document ).ready( function( $ ) {

"use strict";

$('#blm_category_select').on('change', function() {
  //alert( $('#blm_category_select  option:selected').text());
  var str = $('#blm_category_select  option:selected').text().split('-');
  $('#binary-level-marketting-cat_name').val(str[1]);
  
});


$('#srb_teacher_select').on('change', function() {
  
  var str = $('#blm_category_select  option:selected').text().split('-');
  var modified = str[0].replace('(','').replace(')','');
  //alert(trim(modified[0]));
  $('#srb_ctid_hidden').val(trim(modified));
});


$('#blm_parent_select_memtree_view').on('change', function() {
  
  var str = $('#blm_parent_select_memtree_view  option:selected').text().split('-');
  var modified = str[0].replace('(','').replace(')','');
  $('#binary-level-marketting-treeview_mem_id').val($.trim(modified));

});

$('#srb_class_select_tt_entry').on('change', function(){
    
    var dropdown_ids = [
        '#srb_monslot1','#srb_tueslot1','#srb_wedslot1','#srb_thuslot1','#srb_frislot1',
        '#srb_monslot2','#srb_tueslot2','#srb_wedslot2','#srb_thuslot2','#srb_frislot2',
        '#srb_monslot3','#srb_tueslot3','#srb_wedslot3','#srb_thuslot3','#srb_frislot3',
        '#srb_monslot4','#srb_tueslot4','#srb_wedslot4','#srb_thuslot4','#srb_frislot4',
        '#srb_monslot5','#srb_tueslot5','#srb_wedslot5','#srb_thuslot5','#srb_frislot5',
        '#srb_monslot6','#srb_tueslot6','#srb_wedslot6','#srb_thuslot6','#srb_frislot6',
        '#srb_monslot7','#srb_tueslot7','#srb_wedslot7','#srb_thuslot7','#srb_frislot7',
        '#srb_monslot8','#srb_tueslot8','#srb_wedslot8','#srb_thuslot8','#srb_frislot8'
        ];
        
    $.each(dropdown_ids, function(index, value){
        $(value).html('<option value="0"> Select a Subject</option>');
    });     
    
    var str = $('#srb_class_select_tt_entry  option:selected').val();
    
    
    if(str >= 0 && str<35 ) {
        
        var Subjects = {
            1:'Mathematics (32)',
            2:'Religion (11)',
            3:'Science (34)',
            4:'Sinhala (21)',
            5:'English (31)',
            6:'History (33)',
            27:'Library',
            17:'Basket 01',
            18:'Basket 02',
            19:'Basket 03'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    
    if( str >= 35 && str < 103 ) {
        
        var Subjects = {
            1:'Mathematics (32)',
            2:'Religion (11)',
            3:'Science (34)',
            4:'Sinhala (21)',
            5:'English (31)',
            6:'History (33)',
            31:'P.T.S.',
            32:'Health',
            33:'CIVICS',
            34:'Geography',
            27:'Library',
            29:'Aesthetic Subjects'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    //Art Language Classes
    if( str == 103 || str == 104 || str == 105 || str == 120 || str == 121 || str == 122 ) {
        
        var Subjects = {
            41:'General English (13)',
            65:'G I T (60)',
            27:'Library',
            92:'Basket 01',
            93:'Basket 02',
            94:'Basket 03'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    
    //Math Class
    if( ( str >= 106 && str < 110 ) || ( str >= 123 && str < 127 ) ) {
        
        var Subjects = {
            41:'General English (13)',
            65:'G I T (60)',
            27:'Library',
            36:'Physics (01)',
            37:'Chemistry (02)',
            40:'Combined Maths (10)',
            88:'Basket 01'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    //Bio Class
    if( ( str >= 110 && str < 114 ) || ( str >= 127 && str < 131 ) ) {
        
        var Subjects = {
            41:'General English (13)',
            65:'G I T (60)',
            27:'Library',
            36:'Physics (01)',
            37:'Chemistry (02)',
            40:'Biology (09)',
            89:'Basket 01'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    //ETec Class
    if( ( str >= 114 && str < 118 ) || ( str >= 133 && str < 137 ) ) {
        
        var Subjects = {
            41:'General English (13)',
            65:'G I T (60)',
            27:'Library',
            55:'Engineering Technology (65)',
            57:'Science for Technology (67)',
            90:'Basket 01'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    //BTec Class
    if( str == 132 || str == 133  ||  str == 118 || str == 119) {
        
        var Subjects = {
            41:'General English (13)',
            65:'G I T (60)',
            27:'Library',
            56:'Biosystems Technology (66)',
            57:'Science for Technology (67)',
            91:'Basket 01'
        };
        
        $.each(dropdown_ids, function(index, value) {
            
            $.each(Subjects, function(val, text) {
                              
                $(value).append(
                    $('<option></option>').val(val).html(text)
                );
            });
            
        });
    }
    
});
});