$('.show').bind('click',function(){
	var year = $('.year').val();
	var semister = $('.semister').val();
	
	$.ajax({
		type:'POST',
		url:'data/moduleOption.php',
		data:{year:year,semister:semister},
		success:function(data){
			/*$.each(data,function(index,value){
				$('.results').append('<option>'+value+'</option>');
			});*/
		}
	});
	
});