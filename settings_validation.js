window.onload = function(){
	var mainForm = document.getElementById("settings-form");
	var initialBorder = mainForm["password"].style.borderColor;
	//var reqs = document.getElementsByClassName("required");
	mainForm.addEventListener("submit",function(e){
	
		if(mainForm["password"].value == "" && mainForm["confirmPassword"].value == "" && mainForm["skill"].value == ""){
			mainForm["password"].style.borderColor = initialBorder;
			mainForm["confirmPassword"].style.borderColor = initialBorder;
			e.preventDefault();
		}
		else{
		 if(mainForm["password"].value != "" || mainForm["confirmPassword"].value != ""){
			if(mainForm["password"].value !=""){
				if(mainForm["password"].value != mainForm["confirmPassword"].value){
					mainForm["password"].style.borderColor = "red";
					mainForm["confirmPassword"].style.borderColor = "red";
					e.preventDefault();
				}
			}if(mainForm["confirmPassword"].value!=""){
					mainForm["password"].style.borderColor = "red";
					mainForm["confirmPassword"].style.borderColor = "red";
					e.preventDefault();
			}
		}
	}
	
	});

	var closeButton = document.getElementById("settings-close");
	closeButton.addEventListener("click", function(f){
		mainForm["password"].value = "";
		mainForm["confirmPassword"].value="";
		mainForm["skill"]="";
		mainForm["password"].style.borderColor = initialBorder;
		mainForm["confirmPassword"].style.borderColor = initialBorder;

	});
}