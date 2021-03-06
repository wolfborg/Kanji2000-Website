window.onload = function(){
	var mainForm = document.getElementById("register-form");
	var reqs = [mainForm["username"], mainForm["email"], mainForm["confirmEmail"], mainForm["password"], mainForm["confirmPassword"]];

	var initialBorder = reqs[0].style.borderColor;
	//var reqs = document.getElementsByClassName("required");
	mainForm.addEventListener("submit",function(e){
		for(var i=0; i < reqs.length; i++){
			if(reqs[i]){
				if(reqs[i].value == null || reqs[i].value == ""){
					reqs[i].style.borderColor = "red";
					e.preventDefault();
				} else {
					if (reqs[i].style.borderColor == "red") {
						reqs[i].style.borderColor = initialBorder;
					}
				}
			}
		}

		if (mainForm["email"].value == "" || mainForm["email"].value != mainForm["confirmEmail"].value) {
			mainForm["email"].style.borderColor = "red";
			mainForm["confirmEmail"].style.borderColor = "red";
			e.preventDefault();
		} else {
			if (mainForm["email"].style.borderColor == "red") {
				mainForm["email"].style.borderColor = initialBorder;
			}
			if (mainForm["confirmEmail"].style.borderColor == "red") {
				mainForm["confirmEmail"].style.borderColor = initialBorder;
			}
		}

		if (mainForm["password"].value == "" || mainForm["password"].value != mainForm["confirmPassword"].value) {
			mainForm["password"].style.borderColor = "red";
			mainForm["confirmPassword"].style.borderColor = "red";
			e.preventDefault();
		} else {
			if (mainForm["password"].style.borderColor == "red") {
				mainForm["password"].style.borderColor = initialBorder;
			}
			if (mainForm["confirmPassword"].style.borderColor == "red") {
				mainForm["confirmPassword"].style.borderColor = initialBorder;
			}
		}
	});

	var closeButton = document.getElementById("register-close");
	closeButton.addEventListener("click", function(f){
		mainForm["firstName"].value = "";
		mainForm["lastName"].value= "";
		mainForm["username"].value = "";
		mainForm["email"].value= "";
		mainForm["confirmEmail"].value = "";
		mainForm["password"].value = "";
		mainForm["confirmPassword"].value="";
		
		mainForm["username"].style.borderColor = initialBorder;
		mainForm["email"].style.borderColor = initialBorder;
		mainForm["confirmEmail"].style.borderColor = initialBorder;
		mainForm["password"].style.borderColor = initialBorder;
		mainForm["confirmPassword"].style.borderColor = initialBorder;

	});
}