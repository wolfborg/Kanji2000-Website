window.onload = start();

function start(){
	
	var nextButton,backButton;

	var A = document.getElementById("A");
	var B = document.getElementById("B");
	var C = document.getElementById("C");
	var D = document.getElementById("D");
	var bar = document.getElementById("bar");

	var borderInitial = A.style.borderColor;
	var backgroundInitial = A.style.backgroundColor;

	var kanji = document.getElementById("kanji").innerText;
	var answer = document.getElementById("english").innerText;

	var currentAnswer;
	var wrongAnswer = 0;

	var numberQuestions = 10;
	var onQuestion = 1;

	var questionLabel = document.getElementById("numberQuestion");
		
	var percent = (100/numberQuestions);
	bar.style.width = percent + "%";

	var answerButtons;
	var answers = [];
	var lastAnswer;

	A.addEventListener("click",function(e){ correctCheck(this, "A"); });
	B.addEventListener("click",function(e){ correctCheck(this, "B"); });
	C.addEventListener("click",function(e){ correctCheck(this, "C"); });
	D.addEventListener("click",function(e){ correctCheck(this, "D"); });

	setOptions();



	function correctCheck(button, choice) {
		if(isCorrect(choice)){
			nextQuestion();
		}else{
			button.setAttribute("disabled","disbaled");
			button.style.borderColor = "red";
			button.style.backgroundColor = "pink";
			wrongAnswer++;
			if(wrongAnswer==3){
				//nextQuestion();
			}
			return false;
		}
	}

	function setOptions(){
		kanji = document.getElementById("kanji").innerText;
	    answer = document.getElementById("english").innerText;

		switch(randomAnswer()){
			case 1:
				A.innerText = answer;
				currentAnswer = "A";
				break;
			case 2:
				B.innerText = answer;
				currentAnswer = "B";
				break;	
			case 3:
				C.innerText = answer;
				currentAnswer = "C";
				break;	
			case 4:
				D.innerText = answer;
				currentAnswer = "D";
				break;
				
		}
		//alert(answer + ":" + currentAnswer);
		
	}
		
	function randomAnswer(){
		return Math.floor((Math.random() * 4) + 1);
	}
		
	function isCorrect(choice){
		return choice == currentAnswer;
	}
		
	function nextQuestion(e){
		A.removeAttribute("disabled");
		B.removeAttribute("disabled");
		C.removeAttribute("disabled");
		D.removeAttribute("disabled");

		A.style.borderColor = borderInitial;
		B.style.borderColor = borderInitial;
		C.style.borderColor = borderInitial;
		D.style.borderColor = borderInitial;

		A.style.backgroundColor = backgroundInitial;
		B.style.backgroundColor = backgroundInitial;
		C.style.backgroundColor = backgroundInitial;
		D.style.backgroundColor = backgroundInitial;


		onQuestion++;
		wrongAnswer = 0;

		questionLabel.innerHTML = "<h3>" + (onQuestion) + "</h3>";

		percent=percent+(100/numberQuestions);
		bar.style.width = percent + "%";
		
		if(onQuestion==numberQuestions+1){
			onQuestion = 0;
			quizOver();
		}
		
		// Loads the new kanji and answer
		loadQuiz();
	}
		
	function loadQuiz() {
		$("#quiz").load(location.href + " #quiz", function(){
			lastAnswer = answer;
			answer = document.getElementById("english").innerText;
			
			if (lastAnswer != answer) {
				kanji = document.getElementById("kanji").innerText;
				A = document.getElementById("A");
				B = document.getElementById("B");
				C = document.getElementById("C");
				D = document.getElementById("D");

				A.addEventListener("click",function(e){ correctCheck(this, "A"); });
				B.addEventListener("click",function(e){ correctCheck(this, "B"); });
				C.addEventListener("click",function(e){ correctCheck(this, "C"); });
				D.addEventListener("click",function(e){ correctCheck(this, "D"); });

				setOptions();
				return;
			}

			console.log("dup");
			loadQuiz();
		});
	}

		
	function quizOver(){
		percent = (100/numberQuestions);
		bar.style.width = percent + "%";
		onQuestion++;
		questionLabel.innerHTML = "<h3>" + (onQuestion) + "</h3>";
		//alert("Quiz Over");
	}

	function lastQuestion(){
		
		if(onQuestion==numberQuestions){
			onQuestion = 0;
			quizOver();
		}
		
	}
}

	
	
