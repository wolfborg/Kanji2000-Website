window.onload = start();

function start(){
var A,B,C,D,nextButton,backButton,bar;

A = document.getElementById('A');
B = document.getElementById("B");
C = document.getElementById("C");
D = document.getElementById("D");
bar = document.getElementById("bar")


var kanji = document.getElementById("Kanji");

var currentAnswer="A";
var wrongAnswer = 0;

var numberQuestions = 10;
var onQuestion = 0;
var questionLabel = document.getElementById("numberQuestion");
	
var percent = (100/numberQuestions);
bar.style.width = percent + "%";


A.addEventListener("click",function(e){
	if(isCorrect("A")){
		nextQuestion();
	}else{
		this.setAttribute("disabled","disbaled");
		wrongAnswer++;
		if(wrongAnswer==3){
			nextQuestion();
		}
	}
}
);
	
B.addEventListener("click",function(e){
	if(isCorrect("B")){
		nextQuestion();
	}else{
		this.setAttribute("disabled","disbaled");
		wrongAnswer++;
			if(wrongAnswer==3){
			nextQuestion(this);
		}
	}

}
);
	
C.addEventListener("click",function(e){
	if(isCorrect("C")){
		nextQuestion();
	}else{
		this.setAttribute("disabled","disbaled");
		wrongAnswer++;
			if(wrongAnswer==3){
			nextQuestion();
		}
		
	}

}
);
	
D.addEventListener("click",function(e){
	if(isCorrect("D")){
		nextQuestion();
	}else{
		this.setAttribute("disabled","disbaled");
		wrongAnswer++;
			if(wrongAnswer==3){
			nextQuestion();
		}
	}
	

}
);
	
function isCorrect(answer){
	return answer == currentAnswer;
}
	
function nextQuestion(e){
	wrongAnswer = 0;
	onQuestion++
	questionLabel.innerHTML = "<h3>" + (1+onQuestion) + "</h3>";

	percent=percent+(100/numberQuestions);
	bar.style.width = percent + "%";
	
	if(onQuestion==numberQuestions){
		onQuestion = 0;
		quizOver();
	}else{
		

	A.removeAttribute("disabled");
	B.removeAttribute("disabled");
	C.removeAttribute("disabled");
	D.removeAttribute("disabled");
	}


}
	
function quizOver(){
	percent = (100/numberQuestions);
	bar.style.width = percent + "%";
	questionLabel.innerHTML = "<h3>" + (1+onQuestion) + "</h3>";
	alert("Quiz Over");
}

function lastQuestion(){
	
	if(onQuestion==numberQuestions){
		onQuestion = 0;
		quizOver();
	}
	
}
	
}