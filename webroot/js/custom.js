
var host = '//'+$(location).attr('host');
	

$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = host+'/upload/csv';
    $('#csvupload').fileupload({
        url: url,
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(csv)$/i,
        done: function (e, data) {
        	$.each(data.result.files, function (index, file) {
	        	var url2 = host+'/action/checkFormatFileCSV';
	        	$.ajax({
			        type: 'POST',
			        url: url2,
			        data: {
			            filename: file.name
			        },
			        success: function(response) {
			        	var res = $.parseJSON(response);
			        	var sizefile = (res.length)-1;
    					if (res.flag)
					  	{
					  		resetAll();
					  		$('#message').html(alertMessage(res.flag, 'File csv have '+ sizefile +' rows!'));
						  	var strbtnplay = '<span class="btn btn-primary fileplay-button" bool="true" filename="'+file.name+'" maxsize="'+ sizefile +'" startnum="1" ><i class="glyphicon glyphicon-play"></i> Start</span>';
							var strbtnpause = '<span class="btn btn-warning filepause-button disabled" bool="false"><i class="glyphicon glyphicon-pause"></i> Pause</span>';
							var strbtnstop = '<span class="btn btn-danger filestop-button disabled" bool="false" filename="'+file.name+'" ><i class="glyphicon glyphicon-stop"></i> Stop</span>';
							$('#actionbtn').parent().removeClass('hidden');
							$('#actionbtn').html(strbtnplay+strbtnpause+strbtnstop);
							scrollToAnchor();
					  	} else {
					  		$('#message').html(alertMessage(res.flag, 'Incorrect file format.!'));
					  	}
			        }
			    });
	        });
        },
        progressall: function (e, data) {
           
        },
        fail: function (e, data) {
			alert('Error Upload !');
			
        },
        submit: function(e, data) {
        }
    });
});


$(document).on('click', '.fileplay-button', function(){
	if (check()) {
		var filename = $(this).attr('filename');
		var maxsize = $(this).attr('maxsize');
		var startnum = $(this).attr('startnum');
		var status = $("#progress").attr('status', 'start');
		$(this).attr('bool','false');
		$(this).addClass('disabled');
		$('.fileinput-button').addClass('hidden');
		$('.filepause-button').attr('bool','true');
		$('.filepause-button').removeClass('disabled');
		$('.filestop-button').attr('bool','true');
		$('.filestop-button').removeClass('disabled');
		$('#resultCheck').removeClass('hidden');
	   	scrollToAnchor();
		ajaxTest(filename, startnum, maxsize);
		
	}

});

$(document).on('click', '.filepause-button', function(){
	if (check()) {
		$(this).attr('bool','false');
		$(this).addClass('disabled');
		$('.fileplay-button').attr('bool','true');
		$('.fileplay-button').removeClass('disabled');
		$("#progress").attr('status', 'pause');
		changeTable();
	}
});
$(document).on('click', '.filestop-button', function(){
	stopFile();
});
$(document).on('click', '#downloadFileSuccess', function(){
	var url = host+'/action/downloadfileCSV';
	var filename = $(this).attr('filename');
	window.location.href = url+'/success/'+filename;
});
$(document).on('click', '#downloadFileWrong', function(){
	var url = host+'/action/downloadfileCSV';
	var filename = $(this).attr('filename');
	window.location.href = url+'/wrong/'+filename;
});

function ajaxTest(filename, number, maxsize)
{
	var url = host+'/action/getDataFile';
	var action = "start";
	$.ajax({
        type: 'POST',
        url: url,
        data: {
        	action: action,
            filename: filename,
            number: number
        },
        success: function(response) {
        	var status = $("#progress").attr('status');
        	if (status == "start") {
	        	maxsize = parseInt(maxsize);
	        	var progress = parseFloat(number / maxsize * 100, 10);
	        	$('#progress').css('width',progress + '%' );
	        	$('#progress').html(number + "/" + maxsize);

	        	if (number > maxsize) {
	        		$('#progress').addClass('progress-bar-success');
	        		stopFile();
	        	} else {
	        		var res = $.parseJSON(response);

		            if (res.result) {	
						var numtrue = $('#tablesuccess tbody tr').length + 1;
	            		var str2 = '<tr><td>'+numtrue+'</td><td>'+res.forum+'</td><td>'+ res.url+'</td></tr>';
	            		$('.numberSuccess').html(numtrue+"/"+maxsize);
		            	$( str2 ).appendTo( "#tablesuccess tbody" );

		            } else {
		            	var numfalse = $('#tabledanger tbody tr').length + 1;
		            	var str2 = '<tr><td>'+numfalse+'</td><td>'+res.forum+'</td><td>'+ res.url+'</td></tr>';
		            	$('.numberWrong').html(numfalse+"/"+maxsize);
		            	$( str2 ).appendTo( "#tabledanger tbody" );
		            }

		            if (number == maxsize) {
		            	$('#progress').addClass('progress-bar-success');
		            	stopFile();
	        		} else {
			            number++; 
			            $('.fileplay-button').attr('startnum', number);
		            	ajaxTest(filename, number, maxsize);
		            	
	        		}
	        		
	        	}
        	} else {
        		
        	}
        }
    });	
}

function changeTable()
{
	// $('#tablesuccess').paging({limit:10});
	// $('#tabledanger').paging({limit:10});
}
function alertMessage(bool, message)
{
	var html = '';
	if (bool) {
		var html = '<div class="alert alert-success" role="alert">'+message+'</div>';
	} else {
		var html = '<div class="alert alert-danger" role="alert">'+message+'</div>';
	}
	return html;
}

function scrollToAnchor(){
    var aTag = $("#actionbtn");
    
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

function check()
{
	var boolPlay = $('.fileplay-button').attr('bool');
	var boolPause = $('.filepause-button').attr('bool');
	var boolStop = $('.filestop-button').attr('bool');

	var flag = false;
	if (boolPlay == "true")
	{
		if (boolPause == "true") 
		{
			flag = false;
			return flag;
		} else {
			flag = true;
			return flag;
		}
		console.log('flag',flag);
	} else {
		if (boolPause == "true") 
		{
			flag = true;
			return flag;
		} else {
			flag = false;
			return flag;
		}
	} 
}
function stopFile()
{
	changeTable();
	var filename = $('.filestop-button').attr('filename');
	$("#progress").attr('status', 'stop');
	$('.fileinput-button').removeClass('hidden');
	$('#downloadFileSuccess').parent().removeClass('hidden');
	$('#downloadFileWrong').parent().removeClass('hidden');
	$('#downloadFileSuccess').attr('filename', filename);
	$('#downloadFileWrong').attr('filename', filename);
	$('#actionbtn').html("");
	$('#actionbtn').parent().addClass('hidden');
	$('#message').html("");
}
function resetAll()
{

	$('#tablesuccess tbody').html("");
	$('#tabledanger tbody').html("");
	$('#progress').css('width', '0%' );
	$('.numberWrong').html("");
	$('.numberSuccess').html("");
	$('#downloadFileSuccess').parent().addClass('hidden');
	$('#downloadFileWrong').parent().addClass('hidden');
	$('#tablesuccess').parent().find('.paging-nav').remove();
	$('#tabledanger').parent().find('.paging-nav').remove();
}
