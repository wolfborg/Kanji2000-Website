window.onload = function(){
	var mainForm = document.getElementById("mainForm");
	var reqs = document.getElementsByClassName("required");
	mainForm.addEventListener("submit",function(e){
		for(var i=0; i < reqs.length; i++){
			if(reqs[i].type=="text"){
				if(reqs[i].value == null || reqs[i].value == ""){
					reqs[i].parentElement.style.backgroundColor = "red";
					reqs[i].style.backgroundColor = "red";
					e.preventDefault();
				}
				else{
					reqs[i].parentElement.style.backgroundColor = "lime";
					reqs[i].style.backgroundColor = "lime";					
				}
			}		
			if(reqs[i].type == "radio"){
				if(!reqs[i].checked){
					reqs[i].parentElement.style.backgroundColor = "red";	
					e.preventDefault();
				}
				else{
					reqs[i].parentElement.style.backgroundColor = "lime";					
				}
			}
		}		
	});
}