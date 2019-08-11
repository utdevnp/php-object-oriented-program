
$(document).ready(function() {
  
    $('a[href*=delete]').addClass('delete');
    
  });
function myFunction()
{
	var agree=confirm("Are you sure you want to delete this file?");
	
	if(agree==true)
	{
		var url = $(this).attr('href');
		$('#program_content').load(url, data, complete)
	}
}
$(document).ready(function(){
	$(".delete").click(function(){
		myFunction();
		return false;
	});
});

