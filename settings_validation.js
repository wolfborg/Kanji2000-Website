window.onload = function(){
	var mainForm = document.getElementById("settings-form");

	var initialBorder = mainForm["password"].style.borderColor;
	//var reqs = document.getElementsByClassName("required");
	mainForm.addEventListener("submit",function(e){
		e.preventDefault();


		/*
		if (mainForm["password"].value == "" || mainForm["confirmPassword"].value == "") {
			if(mainForm["password"].value != "" || mainForm["confirmPassword"].value != "" && mainForm["password"].value != mainForm["confirmPassword"].value){
			mainForm["password"].style.borderColor = "red";
			mainForm["confirmPassword"].style.borderColor = "red";
			e.preventDefault();
			}
		} else {
			if (mainForm["password"].style.borderColor == "red") {
				mainForm["password"].style.borderColor = initialBorder;
			}
			if (mainForm["confirmPassword"].style.borderColor == "red") {
				mainForm["confirmPassword"].style.borderColor = initialBorder;
			}
		}*/
	
		if(mainForm["password"].value == "" && mainForm["confirmPassword"].value == "" /*and if skill is blank*/){
			mainForm["password"].style.borderColor = initialBorder;
			mainForm["confirmPassword"].style.borderColor = initialBorder;
			e.preventDefault();
		}
		else if(mainForm["password"].value != "" || mainForm["confirmPassword"].value != "" /*or if skill is not blank*/){
			if(mainForm["password"].value !=""){
				if(mainForm["password"].value != mainForm["confirmPassword"].value){
					mainForm["password"].style.borderColor = "red";
					mainForm["confirmPassword"].style.borderColor = "red";
					e.preventDefault();
				}
			}else if(mainForm["confirmPassword"].value!=""){
					mainForm["password"].style.borderColor = "red";
					mainForm["confirmPassword"].style.borderColor = "red";
					e.preventDefault();
			}


		}
	
	});
}