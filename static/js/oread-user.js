$(document).ready(function() {
	$("#RegistrationForm").submit(function() {	
		
		$.ajax({
			type: "POST",
			url: $("#RegistrationForm").attr( 'action' ),
			data:$("#RegistrationForm").serialize(),
			success: function (data) {	
				data  = JSON.parse(data);				
				if(data.status == 'error'){
					$('#results').html(data.message);
				}else{				
					window.location.href = data.redirect;
				}
			},
			error: function(jqXHR, text, error){
            // Displaying if there are any errors
            	$('#results').html("error: "+error);           
        }
    });
		return false;
	});
});

$(document).ready(function() {
	$("#LoginForm").submit(function() {	
		
		$.ajax({
			type: "POST",
			url: $("#LoginForm").attr( 'action' ),
			data:$("#LoginForm").serialize(),
			success: function (data) {	
				//alert(data);
				data  = JSON.parse(data);				
				if(data.status == 'error'){
					$('#login-error').html(data.message);
				}else{				
					window.location.href = data.redirect;
				}
			},
			error: function(jqXHR, text, error){
            // Displaying if there are any errors
            	$('#login-error').html("error: "+error);           
        }
    });
		return false;
	});
});