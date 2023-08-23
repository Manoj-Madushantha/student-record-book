$( document ).ready( function( $ ) {

"use strict";

    var str='';
                var dropdownsAL = [
                        '#period-01-drop-downAL', 
                        '#period-02-drop-downAL', 
                        '#period-03-drop-downAL', 
                        '#period-04-drop-downAL', 
                        '#period-05-drop-downAL', 
                        '#period-06-drop-downAL', 
                        '#period-07-drop-downAL', 
                        '#period-08-drop-downAL'
                    ]
                    
                var tablesAL = [
    		        '#period-01-tableAL',
    		        '#period-02-tableAL',
    		        '#period-03-tableAL',
    		        '#period-04-tableAL',
    		        '#period-05-tableAL',
    		        '#period-06-tableAL',
    		        '#period-07-tableAL',
    		        '#period-08-tableAL'
		        ];
                    
                $('#srb_class_select_al').on('change', function() {
                  //alert( $('#blm_category_select  option:selected').text());
                  str = $('#srb_class_select_al  option:selected').text();
                  
                  $("input[type='text']").each(function () {
                      $(this).attr("value", "");
                      $(this).attr("enabled", "enabled");
                      $(this).removeAttr("disabled");
                  });
                  
                  $.each(tablesAL, function(index, value){
                      
                      $(value).empty();
                  });
                  
                  $("input[type='checkbox']").each(function () {
                      $(this).prop('checked', false);
                  });
                  
                  
                  
                  $.each(dropdownsAL, function(index, value){
                           $(value).html('<option value="0"> Select a Subject</option>');
                    });
                       
                  
                  if(str.includes('A') || str.includes('L')){
                      
                      //Art Clas
                      
                       
                       var Subjects = {
                            41 : 'General English ( 13 )',
                            65 : 'General Information Technology ( 13 )',
                            27 : 'Library ',
                            92 : 'Basket ( 1 )',
                            93 : 'Basket ( 2 )',
                            94 : 'Basket ( 3 )'
                        };
                        
                        $.each(dropdownsAL, function(index, value) {
                        
                          $.each(Subjects, function(val, text) {
                              
                                $(value).append(
                                    $('<option></option>').val(val).html(text)
                                );
                            });
                            
                        });
                       
                  }
                  if(str.includes('110') || str.includes('111') || str.includes('112') || str.includes('113') || str.includes('127') || str.includes('128') || str.includes('129') || str.includes('130') ){
                      //Bio Class

                        var Subjects = {
                            37 : 'Chemistry ( 02 )',
                            39 : 'Biology ( 09 )',
                            41 : 'General English ( 13 )',
                            65 : 'General Information Technology ( 13 )',
                            27 : 'Library ',
                            89 : 'Basket ( 03 )'
                        };
                        
                        $.each(dropdownsAL, function(index, value) {
                        
                          $.each(Subjects, function(val, text) {
                              
                                $(value).append(
                                    $('<option></option>').val(val).html(text)
                                );
                            });
                            
                        });
                        
                        
                        
                  }
                  if(str.includes('M')){
                      // Maths
                       
                      var Subjects = {
                        36 : 'Physics ( 01 )',
                        40 : 'Combined Maths ( 10 )',
                        41 : 'General English ( 13 )',
                        65 : 'General Information Technology ( 13 )',
                        27 : 'Library ',
                        88 : 'Basket ( 03 )'
                        };
                      
                        $.each(dropdownsAL, function(index, value) {
                        
                          $.each(Subjects, function(val, text) {
                              
                                $(value).append(
                                    $('<option></option>').val(val).html(text)
                                );
                            });
                            
                        });
                                             
                  }
                  if(str.includes('118') || str.includes('119') || str.includes('132') ){
                      //BTec Class
                       
                       var Subjects = {
                            56 : 'Biosystems Technology ( 66 )',
                            57 : 'Science for Technology ( 67 )',
                            41 : 'General English ( 13 )',
                            65 : 'General Information Technology ( 13 )',
                            27 : 'Library ',
                            91 : 'Basket ( 03 )'
                        };
                        
                        $.each(dropdownsAL, function(index, value) {
                        
                          $.each(Subjects, function(val, text) {
                              
                                $(value).append(
                                    $('<option></option>').val(val).html(text)
                                );
                            });
                            
                        });
                        
                  }
                  if(str.includes('114') || str.includes('115') || str.includes('116') || str.includes('117') || str.includes('133') || str.includes('134') || str.includes('135') || str.includes('136') ){
                      //ETec Class
                       
                       var Subjects = {
                            55 : 'Engineering Technology ( 65 )',
                            57 : 'Science for Technology ( 67 )',
                            41 : 'General English ( 13 )',
                            65 : 'General Information Technology ( 13 )',
                            27 : 'Library ',
                            90 : 'Basket ( 03 )'
                        };
                        
                        $.each(dropdownsAL, function(index, value) {
                        
                          $.each(Subjects, function(val, text) {
                              
                                $(value).append(
                                    $('<option></option>').val(val).html(text)
                                );
                            });
                            
                        });
                        
                  }
				  //commerce classes
				  if(str.includes('137') || str.includes('138') || str.includes('139') || str.includes('140') || str.includes('141') || str.includes('142') || str.includes('143') || str.includes('144') || str.includes('145') || str.includes('146')  ){
					//ETec Class


					 var Subjects = {
						  49 : 'Business Studies ( 32 )',
						  50 : 'Accountancy ( 33 )',
						  43 : 'Economics ( 21 )',
						  41 : 'General English ( 13 )',
						  65 : 'General Information Technology ( 13 )',
						  27 : 'Library ',
						  95 : 'Basket ( C )'
					  };
					  
					  $.each(dropdownsAL, function(index, value) {
					  
						$.each(Subjects, function(val, text) {
							
							  $(value).append(
								  $('<option></option>').val(val).html(text)
							  );
						  });
						  
					  });
					  
				}
                  //$('#binary-level-marketting-cat_name').val(str[1]);
                  
                });
                
                // Grade AL Section
		        
		            
		        var subjects = [
		            'Chemistry',
		            'ICT'
		            ];
		        
		        //physics CheckBox ID
		        var checkbxphID = ['phALp1' ,'phALp2' ,'phALp3' ,'phALp4' ,'phALp5' ,'phALp6' ,'phALp7' ,'phALp8' ];
		        
		        //chemistry CheckBox ID
		        var checkbxchID = ['chALp1' ,'chALp2' ,'chALp3' ,'chALp4' ,'chALp5' ,'chALp6' ,'chALp7' ,'chALp8' ];
		        
		        //AGRICulture CheckBox ID
		        var checkbxagriID = ['agriALp1','agriALp2','agriALp3','agriALp4','agriALp5','agriALp6','agriALp7','agriALp8'];
		        
		        //ICT CheckBox ID
		        var checkbxictID = ['ictALp1','ictALp2','ictALp3','ictALp4','ictALp5','ictALp6','ictALp7','ictALp8'];
		        
		        //47 Communication & Media Studies 29 CheckBox ID
		        var checkbxmediaID = ['mediaALp1','mediaALp2','mediaALp3','mediaALp4','mediaALp5','mediaALp6','mediaALp7','mediaALp8'];
		        
		        //44 Geography 22 CheckBox ID
		        var checkbxGeogID = ['GeogALp1','GeogALp2','GeogALp3','GeogALp4','GeogALp5','GeogALp6','GeogALp7','GeogALp8'];
		        
		        //35 Mathematics 7 CheckBox ID
		        var checkbxmathID = ['mathALp1','mathALp2','mathALp3','mathALp4','mathALp5','mathALp6','mathALp7','mathALp8'];
		        
		        //51 Art 51 CheckBox ID
		        var checkbxartID = ['artALp1','artALp2','artALp3','artALp4','artALp5','artALp6','artALp7','artALp8'];
		        
		        //62 Japanese 87 CheckBox ID
		        var checkbxjapID = ['japALp1','japALp2','japALp3','japALp4','japALp5','japALp6','japALp7','japALp8'];
		        
		        //60 French 81 CheckBox ID
		        var checkbxfrenchID = ['frenchALp1','frenchALp2','frenchALp3','frenchALp4','frenchALp5','frenchALp6','frenchALp7','frenchALp8'];
		        
		        //63 Korean 85 CheckBox ID
		        var checkbxkoreanID = ['koreanALp1','koreanALp2','koreanALp3','koreanALp4','koreanALp5','koreanALp6','koreanALp7','koreanALp8'];
		        
		        //61 Hindi 84 CheckBox ID
		        var checkbxhindiID = ['hindiALp1','hindiALp2','hindiALp3','hindiALp4','hindiALp5','hindiALp6','hindiALp7','hindiALp8'];
		        
		        
		        //54 Drama and Theatre (Sinhala) 57 CheckBox ID
		        var checkbxdramaID = ['dramaALp1','dramaALp2','dramaALp3','dramaALp4','dramaALp5','dramaALp6','dramaALp7','dramaALp8'];
		        
		        
		        //43 Economics 21 CheckBox ID
		        var checkbxeconID = ['econALp1','econALp2','econALp3','econALp4','econALp5','econALp6','econALp7','econALp8'];
		        
		        
		        //45 Political Science 23 CheckBox ID
		        var checkbxpoliticID = ['politicALp1','politicALp2','politicALp3','politicALp4','politicALp5','politicALp6','politicALp7','politicALp8'];
		        
		        
		        //48 Business Statistics 31 CheckBox ID
		        var checkbxbusistatID = ['busistatALp1','busistatALp2','busistatALp3','busistatALp4','busistatALp5','busistatALp6','busistatALp7','busistatALp8'];
		        
				//49 Business studies 31 CheckBox ID
				var checkbxbusistudID = ['busistudALp1','busistudALp2','busistudALp3','busistudALp4','busistudALp5','busistudALp6','busistudALp7','busistudALp8'];

		        //58 Sinhala 71 CheckBox ID
		        var checkbxsinID = ['sinALp1','sinALp2','sinALp3','sinALp4','sinALp5','sinALp6','sinALp7','sinALp8'];
		        
		        
		        //59 English 73 CheckBox ID
		         var checkbxengID = ['engALp1','engALp2','engALp3','engALp4','engALp5','engALp6','engALp7','engALp8'];
		        
		        
		        //53 Music (Oriental) 54 CheckBox ID
		        var checkbxomusicID = ['omusicALp1','omusicALp2','omusicALp3','omusicALp4','omusicALp5','omusicALp6','omusicALp7','omusicALp8'];
		        
		        
		        //64 Home Economics 28 CheckBox ID
		        var checkbxheconID = ['heconALp1','heconALp2','heconALp3','heconALp4','heconALp5','heconALp6','heconALp7','heconALp8'];
		        
		        //46 Logic and Scientific Method 24 CheckBox ID
		        var checkbxlogicID = ['logicALp1','logicALp2','logicALp3','logicALp4','logicALp5','logicALp6','logicALp7','logicALp8'];
		        
		        
		        //66 History of Sri Lanka 25 CheckBox ID
		        var checkbxhistID = ['histALp1','histALp2','histALp3','histALp4','histALp5','histALp6','histALp7','histALp8'];
		        
		        
		        //52 Dancing (Indigenous) 52 CheckBox ID
                var checkbxdanceID = ['danceALp1','danceALp2','danceALp3','danceALp4','danceALp5','danceALp6','danceALp7','danceALp8'];
		        
		        
		        
		        
		        
		        
		        //physics CheckBox Name
		          var checkbxphName = ['srb[phALp1]','srb[phALp2]','srb[phALp3]','srb[phALp4]','srb[phALp5]','srb[phALp6]','srb[phALp7]','srb[phALp8]'];
    		     
    		     //chemistry CheckBox Name
		         var checkbxchName = ['srb[chALp1]','srb[chALp2]','srb[chALp3]','srb[chALp4]','srb[chALp5]','srb[chALp6]','srb[chALp7]','srb[chALp8]'];
		       
		       //AgriCulture CheckBox Name
		        var checkbxagriName = ['srb[agriALp1]','srb[agriALp2]','srb[agriALp3]','srb[agriALp4]','srb[agriALp5]','srb[agriALp6]','srb[agriALp7]','srb[agriALp8]'];
		        
		       //ICT CheckBox Name
		        var checkbxictName = ['srb[ictALp1]','srb[ictALp2]','srb[ictALp3]','srb[ictALp4]', 'srb[ictALp5]','srb[ictALp6]','srb[ictALp7]','srb[ictALp8]'];
		        
		        //47 Communication & Media Studies 29 CheckBox Name
		        var checkbxmediaName = ['srb[mediaALp1]','srb[mediaALp2]','srb[mediaALp3]','srb[mediaALp4]', 'srb[mediaALp5]','srb[mediaALp6]','srb[mediaALp7]','srb[mediaALp8]'];
		        
		        //44 Geography 22 CheckBox  Name
		        var checkbxGeogName = ['srb[GeogALp1]','srb[GeogALp2]','srb[GeogALp3]','srb[GeogALp4]', 'srb[GeogALp5]','srb[GeogALp6]','srb[GeogALp7]','srb[GeogALp8]'];
		       
		       //35 Mathematics 7 CheckBox Name
		       var checkbxmathName = ['srb[mathALp1]','srb[mathALp2]','srb[mathALp3]','srb[mathALp4]', 'srb[mathALp5]','srb[mathALp6]','srb[mathALp7]','srb[mathALp8]'];
		       
		       //51 Art 51 CheckBox ID
		       var checkbxartName = ['srb[artALp1]','srb[artALp2]','srb[artALp3]','srb[artALp4]', 'srb[artALp5]','srb[artALp6]','srb[artALp7]','srb[artALp8]'];
		       
		        //62 Japanese 87 CheckBox NAME
		        var checkbxjapName = ['srb[japALp1]','srb[japALp2]','srb[japALp3]','srb[japALp4]', 'srb[japALp5]','srb[japALp6]','srb[japALp7]','srb[japALp8]'];
		        
		        //60 French 81 CheckBox NAME
		        var checkbxfrenchName = ['srb[frenchALp1]','srb[frenchALp2]','srb[frenchALp3]','srb[frenchALp4]', 'srb[frenchALp5]','srb[frenchALp6]','srb[frenchALp7]','srb[frenchALp8]'];
		        
		        //63 Korean 85 CheckBox NAME
		        var checkbxkoreanName = ['srb[koreanALp1]','srb[koreanALp2]','srb[koreanALp3]','srb[koreanALp4]', 'srb[koreanALp5]','srb[koreanALp6]','srb[koreanALp7]','srb[koreanALp8]'];
		        
		        //61 Hindi 84 CheckBox NAME
		        var checkbxhindiName = ['srb[hindiALp1]','srb[hindiALp2]','srb[hindiALp3]','srb[hindiALp4]', 'srb[hindiALp5]','srb[hindiALp6]','srb[hindiALp7]','srb[hindiALp8]'];
		        
		        
		        //54 Drama and Theatre (Sinhala) 57 CheckBox NAME
		        var checkbxdramaName = ['srb[dramaALp1]','srb[dramaALp2]','srb[dramaALp3]','srb[dramaALp4]', 'srb[dramaALp5]','srb[dramaALp6]','srb[dramaALp7]','srb[dramaALp8]'];
		        
		        //43 Economics 21 CheckBox NAME
		        var checkbxeconName = ['srb[econALp1]','srb[econALp2]','srb[econALp3]','srb[econALp4]', 'srb[econALp5]','srb[econALp6]','srb[econALp7]','srb[econALp8]'];
		        
		        //45 Political Science 23 CheckBox NAME
		        var checkbxpoliticName = ['srb[politicALp1]','srb[politicALp2]','srb[politicALp3]','srb[politicALp4]', 'srb[politicALp5]','srb[politicALp6]','srb[politicALp7]','srb[politicALp8]'];
		        
		        //48 Business Statistics 31 CheckBox NAME
		         var checkbxbusistatName = ['srb[busistatALp1]','srb[busistatALp2]','srb[busistatALp3]','srb[busistatALp4]', 'srb[busistatALp5]','srb[busistatALp6]','srb[busistatALp7]','srb[busistatALp8]'];
		         
				 //49  Business Studies 31 CheckBox NAME
				 var checkbxbusistudName = ['srb[busistudALp1]','srb[busistudALp2]','srb[busistudALp3]','srb[busistudALp4]','srb[busistudALp5]','srb[busistudALp6]','srb[busistudALp7]','srb[busistudALp8]'];

		        //58 Sinhala 71 CheckBox NAME
		        var checkbxsinName = ['srb[sinALp1]','srb[sinALp2]','srb[sinALp3]','srb[sinALp4]', 'srb[sinALp5]','srb[sinALp6]','srb[sinALp7]','srb[sinALp8]'];
		        
		        
		        //59 English 73 CheckBox NAME
		        var checkbxengName = ['srb[engALp1]','srb[engALp2]','srb[engALp3]','srb[engALp4]', 'srb[engALp5]','srb[engALp6]','srb[engALp7]','srb[engALp8]'];
		        
		        
		        //53 Music (Oriental) 54 CheckBox NAME
		         var checkbxomusicName = ['srb[omusicALp1]','srb[omusicALp2]','srb[omusicALp3]','srb[omusicALp4]', 'srb[omusicALp5]','srb[omusicALp6]','srb[omusicALp7]','srb[omusicALp8]'];
		        
		        
		        //64 Home Economics 28 CheckBox NAME
		        var checkbxheconName = ['srb[heconALp1]','srb[heconALp2]','srb[heconALp3]','srb[heconALp4]', 'srb[heconALp5]','srb[heconALp6]','srb[heconALp7]','srb[heconALp8]'];
		        
		        //46 Logic and Scientific Method 24 CheckBox ID
		        var checkbxlogicName = ['srb[logicALp1]','srb[logicALp2]','srb[logicALp3]','srb[logicALp4]', 'srb[logicALp5]','srb[logicALp6]','srb[logicALp7]','srb[logicALp8]'];
		        
		        
		        //66 History of Sri Lanka 25 CheckBox ID
		        var checkbxhistName = ['srb[histALp1]','srb[histALp2]','srb[histALp3]','srb[histALp4]', 'srb[histALp5]','srb[histALp6]','srb[histALp7]','srb[histALp8]'];
		        
		        
		        //52 Dancing (Indigenous) 52 CheckBox ID
                var checkbxdanceName = ['srb[danceALp1]','srb[danceALp2]','srb[danceALp3]','srb[danceALp4]', 'srb[danceALp5]','srb[danceALp6]','srb[danceALp7]','srb[danceALp8]'];
		        
		        
		        
		        
		        
		        		       
		       //Physics  Text Box ID
		        var textbxphID = ['phALt1','phALt2','phALt3','phALt4', 'phALt5','phALt6','phALt7','phALt8',];
		        
		        //Chemistry Text Box ID
		        var textbxchID = ['chALt1','chALt2','chALt3','chALt4','chALt5','chALt6','chALt7','chALt8'];
		        
		        //AgriCulture Text Box ID
		        var textbxagriID = ['agriALt1','agriALt2','agriALt3','agriALt4','agriALt5','agriALt6','agriALt7','agriALt8'];
		        
		        //ICT Text Box ID
		        var textbxictID = ['ictALt1','ictALt2','ictALt3','ictALt4', 'ictALt5','ictALt6','ictALt7','ictALt8'];
		        
		        //47 Communication & Media Studies 29  Text Box ID
		        var textbxmediaID = ['mediaALt1','mediaALt2','mediaALt3','mediaALt4', 'mediaALt5','mediaALt6','mediaALt7','mediaALt8'];
		        
		        //44 Geography 22 Text Box ID
		        var textbxGeogID = ['GeogALt1','GeogALt2','GeogALt3','GeogALt4', 'GeogALt5','GeogALt6','GeogALt7','GeogALt8'];
		        
		        //35 Mathematics 7 Text Box ID
		       var textbxmathID = ['mathALt1','mathALt2','mathALt3','mathALt4', 'mathALt5','mathALt6','mathALt7','mathALt8'];
		       
		       //51 Art 51 Text Box ID
		       var textbxartID = ['artALt1','artALt2','artALt3','artALt4', 'artALt5','artALt6','artALt7','artALt8'];
		       
		       //62 Japanese 87 TextBox ID
		        var textbxjapID = ['japALt1','japALt2','japALt3','japALt4', 'japALt5','japALt6','japALt7','japALt8'];
		        
		        //60 French 81 TextBox ID
		        var textbxfrenchID = ['frenchALt1','frenchALt2','frenchALt3','frenchALt4', 'frenchALt5','frenchALt6','frenchALt7','frenchALt8'];
		        
		        //63 Korean 85 TextBox ID
		        var textbxkoreanID = ['koreanALt1','koreanALt2','koreanALt3','koreanALt4', 'koreanALt5','koreanALt6','koreanALt7','koreanALt8'];
		        
		        //61 Hindi 84 TextBox ID
		        var textbxhindiID = ['hindiALt1','hindiALt2','hindiALt3','hindiALt4', 'hindiALt5','hindiALt6','hindiALt7','hindiALt8'];
		        
		        
		        //54 Drama and Theatre (Sinhala) 57 TextBox ID
		        var textbxdramaID = ['dramaALt1','dramaALt2','dramaALt3','dramaALt4', 'dramaALt5','dramaALt6','dramaALt7','dramaALt8'];
		        
		        //43 Economics 21 TextBox ID
		        var textbxeconID = ['econALt1','econALt2','econALt3','econALt4', 'econALt5','econALt6','econALt7','econALt8'];
		        
		        //45 Political Science 23 TextBox ID
		        var textbxpoliticID = ['politicALt1','politicALt2','politicALt3','politicALt4', 'politicALt5','politicALt6','politicALt7','politicALt8'];
		        
		        //48 Business Statistics 31 TextBox ID
		        var textbxbusistatID = ['busistatALt1','busistatALt2','busistatALt3','busistatALt4', 'busistatALt5','busistatALt6','busistatALt7','busistatALt8'];
		        //49 Business Studies 31 TextBox ID
				var textbxbusistudID = ['busistudALt1','busistudALt2','busistudALt3','busistudALt4','busistudALt5','busistudALt6','busistudALt7','busistudALt8'];

		        //58 Sinhala 71 TextBox ID
		        var textbxsinID = ['sinALt1','sinALt2','sinALt3','sinALt4', 'sinALt5','sinALt6','sinALt7','sinALt8'];
		        
		        
		        //59 English 73 TextBox ID
		        var textbxengID = ['engALt1','engALt2','engALt3','engALt4', 'engALt5','engALt6','engALt7','engALt8'];
		        
		        
		        //53 Music (Oriental) 54 TextBox ID
		        var textbxomusicID = ['omusicALt1','omusicALt2','omusicALt3','omusicALt4', 'omusicALt5','omusicALt6','omusicALt7','omusicALt8'];
		        
		        
		        //64 Home Economics 28 TextBox ID
		        var textbxheconID = ['heconALt1','heconALt2','heconALt3','heconALt4', 'heconALt5','heconALt6','heconALt7','heconALt8'];
		        
		        //46 Logic and Scientific Method 24 CheckBox ID
		        var textbxlogicID = ['logicALt1','logicALt2','logicALt3','logicALt4', 'logicALt5','logicALt6','logicALt7','logicALt8'];
		        
		        
		        //66 History of Sri Lanka 25 CheckBox ID
		        var textbxhistID = ['histALt1','histALt2','histALt3','histALt4', 'histALt5','histALt6','histALt7','histALt8'];
		        
		        
		        //52 Dancing (Indigenous) 52 CheckBox ID
		        var textbxdanceID = ['danceALt1','danceALt2','danceALt3','danceALt4', 'danceALt5','danceALt6','danceALt7','danceALt8'];
		        
		        
		        
		        
		        
		        
		        //Physics Text Box Name
		        var textbxphName = ['srb[phALt1]','srb[phALt2]','srb[phALt3]','srb[phALt4]','srb[phALt5]','srb[phALt6]','srb[phALt7]','srb[phALt8]'];
		        
		        //chemistry Text Box Name
		        var textbxchName = ['srb[chALt1]','srb[chALt2]','srb[chALt3]', 'srb[chALt4]','srb[chALt5]','srb[chALt6]','srb[chALt7]','srb[chALt8]'];
		        
		        //AgriCulture Text Box Name
		        
		        var textbxagriName = ['srb[agriALt1]','srb[agriALt2]','srb[agriALt3]','srb[agriALt4]','srb[agriALt5]','srb[agriALt6]','srb[agriALt7]','srb[agriALt8]'];
		        
		        //ICT Text Box Name
		        var textbxictName = ['srb[ictALt1]','srb[ictALt2]','srb[ictALt3]','srb[ictALt4]','srb[ictALt5]','srb[ictALt6]','srb[ictALt7]','srb[ictALt8]'];
		        
		        //47 Communication & Media Studies 29  Text Box Name
		        var textbxmediaName = ['srb[mediaALt1]','srb[mediaALt2]','srb[mediaALt3]','srb[mediaALt4]','srb[mediaALt5]','srb[mediaALt6]','srb[mediaALt7]','srb[mediaALt8]'];
		        
		        //44 Geography 22 Text Box Name
		        var textbxGeogName = ['srb[GeogALt1]','srb[GeogALt2]','srb[GeogALt3]','srb[GeogALt4]','srb[GeogALt5]','srb[GeogALt6]','srb[GeogALt7]','srb[GeogALt8]'];
		        
		        //35 Mathematics 7  Text Box Name
		       var textbxmathName = ['srb[mathALt1]','srb[mathALt2]','srb[mathALt3]','srb[mathALt4]','srb[mathALt5]','srb[mathALt6]','srb[mathALt7]','srb[mathALt8]'];
		       
		       //51 Art 51  Text Box Name
		       var textbxartName = ['srb[artALt1]','srb[artALt2]','srb[artALt3]','srb[artALt4]','srb[artALt5]','srb[artALt6]','srb[artALt7]','srb[artALt8]'];
		       
		       //62 Japanese 87 TextBox NAME
		        var textbxjapName = ['srb[japALt1]','srb[japALt2]','srb[japALt3]','srb[japALt4]','srb[japALt5]','srb[japALt6]','srb[japALt7]','srb[japALt8]'];
		        
		        //60 French 81 TextBox NAME
		        var textbxfrenchName = ['srb[frenchALt1]','srb[frenchALt2]','srb[frenchALt3]','srb[frenchALt4]','srb[frenchALt5]','srb[frenchALt6]','srb[frenchALt7]','srb[frenchALt8]'];
		        
		        //63 Korean 85 TextBox NAME
		        var textbxkoreanName = ['srb[koreanALt1]','srb[koreanALt2]','srb[koreanALt3]','srb[koreanALt4]','srb[koreanALt5]','srb[koreanALt6]','srb[koreanALt7]','srb[koreanALt8]'];
		        
		        //61 Hindi 84 TextBox NAME
		        var textbxhindiName = ['srb[hindiALt1]','srb[hindiALt2]','srb[hindiALt3]','srb[hindiALt4]','srb[hindiALt5]','srb[hindiALt6]','srb[hindiALt7]','srb[hindiALt8]'];
		        
		        
		        //54 Drama and Theatre (Sinhala) 57 TextBox NAME
		        var textbxdramaName = ['srb[dramaALt1]','srb[dramaALt2]','srb[dramaALt3]','srb[dramaALt4]','srb[dramaALt5]','srb[dramaALt6]','srb[dramaALt7]','srb[dramaALt8]'];
		        
		        //43 Economics 21 TextBox NAME
		        var textbxeconName = ['srb[econALt1]','srb[econALt2]','srb[econALt3]','srb[econALt4]','srb[econALt5]','srb[econALt6]','srb[econALt7]','srb[econALt8]'];
		        
		        //45 Political Science 23 TextBox NAME
		        var textbxpoliticName = ['srb[politicALt1]','srb[politicALt2]','srb[politicALt3]','srb[politicALt4]','srb[politicALt5]','srb[politicALt6]','srb[politicALt7]','srb[politicALt8]'];
		        
		        //48 Business Statistics 31 TextBox NAME
		        var textbxbusistatName = ['srb[busistatALt1]','srb[busistatALt2]','srb[busistatALt3]','srb[busistatALt4]','srb[busistatALt5]','srb[busistatALt6]','srb[busistatALt7]','srb[busistatALt8]'];
		        
				//49 Business Studeis 31 TextBox NAME
		        var textbxbusistudName = ['srb[busistudALt1]','srb[busistudALt2]','srb[busistudALt3]','srb[busistudALt4]','srb[busistudALt5]','srb[busistudALt6]','srb[busistudALt7]','srb[busistudALt8]'];
		        //58 Sinhala 71 TextBox NAME
		        var textbxsinName = ['srb[sinALt1]','srb[sinALt2]','srb[sinALt3]','srb[sinALt4]','srb[sinALt5]','srb[sinALt6]','srb[sinALt7]','srb[sinALt8]'];
		        
		        
		        //59 English 73 TextBox NAME
		        var textbxengName = ['srb[engALt1]','srb[engALt2]','srb[engALt3]','srb[engALt4]','srb[engALt5]','srb[engALt6]','srb[engALt7]','srb[engALt8]'];
		        
		        
		        //53 Music (Oriental) 54 TextBox NAME
		        var textbxomusicName = ['srb[omusicALt1]','srb[omusicALt2]','srb[omusicALt3]','srb[omusicALt4]','srb[omusicALt5]','srb[omusicALt6]','srb[omusicALt7]','srb[omusicALt8]'];
		        
		        
		        //64 Home Economics 28 TextBox NAME
		        var textbxheconName = ['srb[heconALt1]','srb[heconALt2]','srb[heconALt3]','srb[heconALt4]','srb[heconALt5]','srb[heconALt6]','srb[heconALt7]','srb[heconALt8]'];
		        
		        //46 Logic and Scientific Method 24 CheckBox ID
		        var textbxlogicName = ['srb[logicALt1]','srb[logicALt2]','srb[logicALt3]','srb[logicALt4]','srb[logicALt5]','srb[logicALt6]','srb[logicALt7]','srb[logicALt8]'];
		        
		        
		        //66 History of Sri Lanka 25 CheckBox ID
		        var textbxhistName = ['srb[histALt1]','srb[histALt2]','srb[histALt3]','srb[histALt4]','srb[histALt5]','srb[histALt6]','srb[histALt7]','srb[histALt8]'];
		        
		        
		        //52 Dancing (Indigenous) 52 CheckBox ID
                var textbxdanceName = ['srb[danceALt1]','srb[danceALt2]','srb[danceALt3]','srb[danceALt4]','srb[danceALt5]','srb[danceALt6]','srb[danceALt7]','srb[danceALt8]'];
		        
		        
		        
		        
		        
		        
		        var timeslot = ['7.50 - 8.30','8.30 - 9.10','9.10 - 9.50','9.50 - 10.30','10.50 - 11.30','11.30 - 12.10','12.10 - 12.50','12.50 - 1.30'];
		            
		            
		        $.each(dropdownsAL, function(dindex, dvalue) {
		                        
            		            $(dvalue).on('change', function() {
                				var value = $(this).val();
                
                				$(tablesAL[dindex]).empty();
                				
                				switch (value) {
            					case "0":
            						break;
            						
            					case "88":

                        					
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Chemistry </td><td><input type="checkbox" id="'+ checkbxchID[dindex] +'" name="'+ checkbxchName[dindex] +'" ></td><td><input list="reason" name="'+ textbxchName[dindex] +'" id="'+ textbxchID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        						
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ICT </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                    		    
                        		break;
                        		
                        		case "89":
                        					
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Physics </td><td><input type="checkbox" id="'+ checkbxphID[dindex] +'" name="'+ checkbxphName[dindex] +'" ></td><td><input list="reason" name="'+ textbxphName[dindex] +'" id="'+ textbxphID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        						
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Agricultural Science </td><td><input type="checkbox" id="'+ checkbxagriID[dindex] +'" name="'+ checkbxagriName[dindex] +'" ></td><td><input list="reason" name="'+ textbxagriName[dindex] +'" id="'+ textbxagriID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                    		    
                        		break;
                        		
                        		case "90":

                                    if(str.includes(116) || str.includes(117)) {
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ICT </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    } else {
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ICT </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Geography </td><td><input type="checkbox" id="'+ checkbxGeogID[dindex] +'" name="'+ checkbxGeogName[dindex] +'" ></td><td><input list="reason" name="'+ textbxGeogName[dindex] +'" id="'+ textbxGeogID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                                    
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Mathematics </td><td><input type="checkbox" id="'+ checkbxmathID[dindex] +'" name="'+ checkbxmathName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmathName[dindex] +'" id="'+ textbxmathID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ART </td><td><input type="checkbox" id="'+ checkbxartID[dindex] +'" name="'+ checkbxartName[dindex] +'" ></td><td><input list="reason" name="'+ textbxartName[dindex] +'" id="'+ textbxartID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    }
                        		break;
                        		
                        		case "91":
                        					
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ICT </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        			
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        			
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Geography </td><td><input type="checkbox" id="'+ checkbxGeogID[dindex] +'" name="'+ checkbxGeogName[dindex] +'" ></td><td><input list="reason" name="'+ textbxGeogName[dindex] +'" id="'+ textbxGeogID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        						
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Agricultural Science </td><td><input type="checkbox" id="'+ checkbxagriID[dindex] +'" name="'+ checkbxagriName[dindex] +'" ></td><td><input list="reason" name="'+ textbxagriName[dindex] +'" id="'+ textbxagriID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        			
                    		    
                        		break;
                                
                                case "92":

                                    if(str.includes(103)) {

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ECONOMICS </td><td><input type="checkbox" id="'+ checkbxeconID[dindex] +'" name="'+ checkbxeconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxeconName[dindex] +'" id="'+ textbxeconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Political Science </td><td><input type="checkbox" id="'+ checkbxpoliticID[dindex] +'" name="'+ checkbxpoliticName[dindex] +'" ></td><td><input list="reason" name="'+ textbxpoliticName[dindex] +'" id="'+ textbxpoliticID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Infromation Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Business Statistics </td><td><input type="checkbox" id="'+ checkbxbusistatID[dindex] +'" name="'+ checkbxbusistatName[dindex] +'" ></td><td><input list="reason" name="'+ textbxbusistatName[dindex] +'" id="'+ textbxbusistatID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    
                                    } else if(str.includes(104)) {

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Hindi </td><td><input type="checkbox" id="'+ checkbxhindiID[dindex] +'" name="'+ checkbxhindiName[dindex] +'" ></td><td><input list="reason" name="'+ textbxhindiName[dindex] +'" id="'+ textbxhindiID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Art </td><td><input type="checkbox" id="'+ checkbxartID[dindex] +'" name="'+ checkbxartName[dindex] +'" ></td><td><input list="reason" name="'+ textbxartName[dindex] +'" id="'+ textbxartID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Drama & Theatre </td><td><input type="checkbox" id="'+ checkbxdramaID[dindex] +'" name="'+ checkbxdramaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxdramaName[dindex] +'" id="'+ textbxdramaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ECONOMICS </td><td><input type="checkbox" id="'+ checkbxeconID[dindex] +'" name="'+ checkbxeconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxeconName[dindex] +'" id="'+ textbxeconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Infromation Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                                    } else {
                        					
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Japanese </td><td><input type="checkbox" id="'+ checkbxjapID[dindex] +'" name="'+ checkbxjapName[dindex] +'" ></td><td><input list="reason" name="'+ textbxjapName[dindex] +'" id="'+ textbxjapID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> French </td><td><input type="checkbox" id="'+ checkbxfrenchID[dindex] +'" name="'+ checkbxfrenchName[dindex] +'" ></td><td><input list="reason" name="'+ textbxfrenchName[dindex] +'" id="'+ textbxfrenchID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Korean </td><td><input type="checkbox" id="'+ checkbxkoreanID[dindex] +'" name="'+ checkbxkoreanName[dindex] +'" ></td><td><input list="reason" name="'+ textbxkoreanName[dindex] +'" id="'+ textbxkoreanID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Hindi </td><td><input type="checkbox" id="'+ checkbxhindiID[dindex] +'" name="'+ checkbxhindiName[dindex] +'" ></td><td><input list="reason" name="'+ textbxhindiName[dindex] +'" id="'+ textbxhindiID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Art </td><td><input type="checkbox" id="'+ checkbxartID[dindex] +'" name="'+ checkbxartName[dindex] +'" ></td><td><input list="reason" name="'+ textbxartName[dindex] +'" id="'+ textbxartID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Drama & Theatre </td><td><input type="checkbox" id="'+ checkbxdramaID[dindex] +'" name="'+ checkbxdramaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxdramaName[dindex] +'" id="'+ textbxdramaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ECONOMICS </td><td><input type="checkbox" id="'+ checkbxeconID[dindex] +'" name="'+ checkbxeconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxeconName[dindex] +'" id="'+ textbxeconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Political Science </td><td><input type="checkbox" id="'+ checkbxpoliticID[dindex] +'" name="'+ checkbxpoliticName[dindex] +'" ></td><td><input list="reason" name="'+ textbxpoliticName[dindex] +'" id="'+ textbxpoliticID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Infromation Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Business Statistics </td><td><input type="checkbox" id="'+ checkbxbusistatID[dindex] +'" name="'+ checkbxbusistatName[dindex] +'" ></td><td><input list="reason" name="'+ textbxbusistatName[dindex] +'" id="'+ textbxbusistatID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    }
                    		    
                        		break;
                        		
                        		
                        		case "93":
                        				
                                    if(str.includes(103)) {

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Sinhala </td><td><input type="checkbox" id="'+ checkbxsinID[dindex] +'" name="'+ checkbxsinName[dindex] +'" ></td><td><input list="reason" name="'+ textbxsinName[dindex] +'" id="'+ textbxsinID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Geography </td><td><input type="checkbox" id="'+ checkbxGeogID[dindex] +'" name="'+ checkbxGeogName[dindex] +'" ></td><td><input list="reason" name="'+ textbxGeogName[dindex] +'" id="'+ textbxGeogID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Agricultural Science </td><td><input type="checkbox" id="'+ checkbxagriID[dindex] +'" name="'+ checkbxagriName[dindex] +'" ></td><td><input list="reason" name="'+ textbxagriName[dindex] +'" id="'+ textbxagriID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Infromation Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    
                                    } else if(str.includes(104)) { 

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Sinhala </td><td><input type="checkbox" id="'+ checkbxsinID[dindex] +'" name="'+ checkbxsinName[dindex] +'" ></td><td><input list="reason" name="'+ textbxsinName[dindex] +'" id="'+ textbxsinID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Geography </td><td><input type="checkbox" id="'+ checkbxGeogID[dindex] +'" name="'+ checkbxGeogName[dindex] +'" ></td><td><input list="reason" name="'+ textbxGeogName[dindex] +'" id="'+ textbxGeogID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Music (Oriental) </td><td><input type="checkbox" id="'+ checkbxomusicID[dindex] +'" name="'+ checkbxomusicName[dindex] +'" ></td><td><input list="reason" name="'+ textbxomusicName[dindex] +'" id="'+ textbxomusicID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Agricultural Science </td><td><input type="checkbox" id="'+ checkbxagriID[dindex] +'" name="'+ checkbxagriName[dindex] +'" ></td><td><input list="reason" name="'+ textbxagriName[dindex] +'" id="'+ textbxagriID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Home Economics </td><td><input type="checkbox" id="'+ checkbxheconID[dindex] +'" name="'+ checkbxheconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxheconName[dindex] +'" id="'+ textbxheconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Infromation Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                                    } else {

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Sinhala </td><td><input type="checkbox" id="'+ checkbxsinID[dindex] +'" name="'+ checkbxsinName[dindex] +'" ></td><td><input list="reason" name="'+ textbxsinName[dindex] +'" id="'+ textbxsinID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> ENGLISH </td><td><input type="checkbox" id="'+ checkbxengID[dindex] +'" name="'+ checkbxengName[dindex] +'" ></td><td><input list="reason" name="'+ textbxengName[dindex] +'" id="'+ textbxengID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Geography </td><td><input type="checkbox" id="'+ checkbxGeogID[dindex] +'" name="'+ checkbxGeogName[dindex] +'" ></td><td><input list="reason" name="'+ textbxGeogName[dindex] +'" id="'+ textbxGeogID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Music (Oriental) </td><td><input type="checkbox" id="'+ checkbxomusicID[dindex] +'" name="'+ checkbxomusicName[dindex] +'" ></td><td><input list="reason" name="'+ textbxomusicName[dindex] +'" id="'+ textbxomusicID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Agricultural Science </td><td><input type="checkbox" id="'+ checkbxagriID[dindex] +'" name="'+ checkbxagriName[dindex] +'" ></td><td><input list="reason" name="'+ textbxagriName[dindex] +'" id="'+ textbxagriID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Home Economics </td><td><input type="checkbox" id="'+ checkbxheconID[dindex] +'" name="'+ checkbxheconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxheconName[dindex] +'" id="'+ textbxheconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Infromation Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    }
                    		    
                        		break;
                        		
                        		
                        		case "94":
                        			
                                    if(str.includes(103)) {

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Logic and Scientific Method </td><td><input type="checkbox" id="'+ checkbxlogicID[dindex] +'" name="'+ checkbxlogicName[dindex] +'" ></td><td><input list="reason" name="'+ textbxlogicName[dindex] +'" id="'+ textbxlogicID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Economics </td><td><input type="checkbox" id="'+ checkbxeconID[dindex] +'" name="'+ checkbxeconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxeconName[dindex] +'" id="'+ textbxeconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> History </td><td><input type="checkbox" id="'+ checkbxhistID[dindex] +'" name="'+ checkbxhistName[dindex] +'" ></td><td><input list="reason" name="'+ textbxhistName[dindex] +'" id="'+ textbxhistID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Information Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                                    }  else {

                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Logic and Scientific Method </td><td><input type="checkbox" id="'+ checkbxlogicID[dindex] +'" name="'+ checkbxlogicName[dindex] +'" ></td><td><input list="reason" name="'+ textbxlogicName[dindex] +'" id="'+ textbxlogicID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Economics </td><td><input type="checkbox" id="'+ checkbxeconID[dindex] +'" name="'+ checkbxeconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxeconName[dindex] +'" id="'+ textbxeconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> History </td><td><input type="checkbox" id="'+ checkbxhistID[dindex] +'" name="'+ checkbxhistName[dindex] +'" ></td><td><input list="reason" name="'+ textbxhistName[dindex] +'" id="'+ textbxhistID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Information Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                        
                                        $(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Dancing (Indigenous) </td><td><input type="checkbox" id="'+ checkbxdanceID[dindex] +'" name="'+ checkbxdanceName[dindex] +'" ></td><td><input list="reason" name="'+ textbxdanceName[dindex] +'" id="'+ textbxdanceID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                                    }
                    		    
                        		break;
                        		
								case "95":
                        					
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Art </td><td><input type="checkbox" id="'+ checkbxartID[dindex] +'" name="'+ checkbxartName[dindex] +'" ></td><td><input list="reason" name="'+ textbxartName[dindex] +'" id="'+ textbxartID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Drama & Theatre </td><td><input type="checkbox" id="'+ checkbxdramaID[dindex] +'" name="'+ checkbxdramaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxdramaName[dindex] +'" id="'+ textbxdramaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Economics </td><td><input type="checkbox" id="'+ checkbxeconID[dindex] +'" name="'+ checkbxeconName[dindex] +'" ></td><td><input list="reason" name="'+ textbxeconName[dindex] +'" id="'+ textbxeconID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        			
									$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Political Science </td><td><input type="checkbox" id="'+ checkbxpoliticID[dindex] +'" name="'+ checkbxpoliticName[dindex] +'" ></td><td><input list="reason" name="'+ textbxpoliticName[dindex] +'" id="'+ textbxpoliticID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Communication & Media Studies </td><td><input type="checkbox" id="'+ checkbxmediaID[dindex] +'" name="'+ checkbxmediaName[dindex] +'" ></td><td><input list="reason" name="'+ textbxmediaName[dindex] +'" id="'+ textbxmediaID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        			
                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Information Communication Technology </td><td><input type="checkbox" id="'+ checkbxictID[dindex] +'" name="'+ checkbxictName[dindex] +'" ></td><td><input list="reason" name="'+ textbxictName[dindex] +'" id="'+ textbxictID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');
                        			
									$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Business Statistics </td><td><input type="checkbox" id="'+ checkbxbusistatID[dindex] +'" name="'+ checkbxbusistatName[dindex] +'" ></td><td><input list="reason" name="'+ textbxbusistatName[dindex] +'" id="'+ textbxbusistatID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                        			$(tablesAL[dindex]).append('<tr><td>' + timeslot[dindex] + '</td><td> Business Studies </td><td><input type="checkbox" id="'+ checkbxbusistudID[dindex] +'" name="'+ checkbxbusistudName[dindex] +'" ></td><td><input list="reason" name="'+ textbxbusistudName[dindex] +'" id="'+ textbxbusistudID[dindex] +'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>');

                    		    
                        		break;
                        		
                            	default:
                            		break;
            				    }
            				    
                                
                                 //textbox disable functions    
                        			$(checkbxchID[dindex]).change(function() {
                        				if($(this).is(":checked")) {
                        					//alert ("The element with id " + this.id + " changed.");
                        					$(textbxchID[dindex]).attr("disabled", "disabled");
                        					$(textbxchID[dindex]).val('');
                        				} else {
                        					$(textbxchID[dindex]).removeAttr("disabled"); 
                        				}
                        			});
                        			
                        			$(checkbxictID[dindex]).change(function() {
                        				if($(this).is(":checked")) {
                        					//alert ("The element with id " + this.id + " changed.");
                        					$(textbxictID[dindex]).attr("disabled", "disabled");
                        					$(textbxictID[dindex]).val('');
                        				} else {
                        					$(textbxictID[dindex]).removeAttr("disabled"); 
                        				}
                        			});
                        			
                        			//textbox disable functions
                        			$(checkbxphID[dindex]).change(function() {
                        				if($(this).is(":checked")) {
                        					//alert ("The element with id " + this.id + " changed.");
                        					$(textbxphID[dindex]).attr("disabled", "disabled");
                        					$(textbxphID[dindex]).val('');
                        				} else {
                        					$(textbxphID[dindex]).removeAttr("disabled"); 
                        				}
                        			});

									
            		        }); // end of change
		                
		        }); // end of each 1
		        
		        
		        $.each(dropdownsAL, function(index, value) {
		            $(value).on('change', function() {
		                            //textbox disable functions    
                        			$(checkbxchID[index]).change(function() {
                        				if($(this).is(":checked")) {
                        					//alert ("The element with id " + this.id + " changed.");
                        					$(textbxchID[index]).attr("disabled", "disabled");
                        					$(textbxchID[index]).val('');
                        				} else {
                        					$(textbxchID[index]).removeAttr("disabled"); 
                        				}
                        			});
                        			
                        			$(checkbxictID[index]).change(function() {
                        				if($(this).is(":checked")) {
                        					//alert ("The element with id " + this.id + " changed.");
                        					$(textbxictID[index]).attr("disabled", "disabled");
                        					$(textbxictID[index]).val('');
                        				} else {
                        					$(textbxictID[index]).removeAttr("disabled"); 
                        				}
                        			});
                        			
                        			//textbox disable functions
                        			$(checkbxphID[index]).change(function() {
                        				if($(this).is(":checked")) {
                        					//alert ("The element with id " + this.id + " changed.");
                        					$(textbxphID[index]).attr("disabled", "disabled");
                        					$(textbxphID[index]).val('');
                        				} else {
                        					$(textbxphID[index]).removeAttr("disabled"); 
                        				}
                        			});
		            });
		        });


            
});
