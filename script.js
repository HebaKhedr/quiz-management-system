const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

// عند الضغط على Start Quiz
start_btn.onclick = () => {
  info_box.classList.add("activeInfo"); 
};

// عند الضغط على Exit
exit_btn.onclick = () => {
  location.replace("./index.php");
};

// عند الضغط على Continue (بدء الأسئلة)
continue_btn.onclick = () => {
  info_box.classList.remove("activeInfo"); 
  quiz_box.classList.add("activeQuiz"); 
  showQuetions(0); 
  queCounter(1); 
  startTimer(15); 
  startTimerLine(0); 
};

let timeValue = 15;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

// الانتقال بين الأسئلة
const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

next_btn.onclick = () => {
  if (que_count < questions.length - 1) {
    que_count++;
    que_numb++;
    showQuetions(que_count);
    queCounter(que_numb);
    clearInterval(counter);
    clearInterval(counterLine);
    startTimer(timeValue);
    startTimerLine(widthValue);
    next_btn.classList.remove("show");
  } else {
    clearInterval(counter);
    clearInterval(counterLine);
    showResult();
  }
};

function showQuetions(index) {
    const que_text = document.querySelector(".que_text");
    const option_list = document.querySelector(".option_list");

  
    que_text.innerHTML = '<span>' + questions[index].question + '</span>';
    option_list.innerHTML = ""; 
    questions[index].options.forEach(opt => {
        let option_div = document.createElement("div");
        option_div.classList.add("option");
        option_div.innerHTML = '<span>'+ opt +'</span>'; // جربي دي ولو منفعش خليها innerText
        option_list.appendChild(option_div);
    });

    const option = option_list.querySelectorAll(".option");
    for(i=0; i < option.length; i++){
        option[i].setAttribute("onclick", "optionSelected(this)");
    }
}
function optionSelected(answer) {
  clearInterval(counter);
  clearInterval(counterLine);
  let userAns = answer.textContent;
  let correcAns = questions[que_count].answer;
  const allOptions = option_list.children.length;

  if (userAns == correcAns) {
    userScore += 1;
    answer.classList.add("correct");
  } else {
    answer.classList.add("incorrect");
    for (i = 0; i < allOptions; i++) {
      if (option_list.children[i].textContent == correcAns) {
        option_list.children[i].setAttribute("class", "option correct");
      }
    }
  }
  for (i = 0; i < allOptions; i++) {
    option_list.children[i].classList.add("disabled");
  }
  next_btn.classList.add("show");
}

function showResult() {
  quiz_box.classList.remove("activeQuiz");
  result_box.classList.add("activeResult");
  const scoreText = result_box.querySelector(".score_text");
  let scoreTag = '<span>You got <p>' + userScore + '</p> out of <p>' + questions.length + '</p></span>';
  scoreText.innerHTML = scoreTag;
}

function startTimer(time) {
  counter = setInterval(timer, 1000);
  function timer() {
    timeCount.textContent = time;
    time--;
    if (time < 9) { timeCount.textContent = "0" + timeCount.textContent; }
    if (time < 0) { clearInterval(counter); }
  }
}

function startTimerLine(time) {
  counterLine = setInterval(timer, 29);
  function timer() {
    time += 1;
    time_line.style.width = time + "px";
    if (time > 549) { clearInterval(counterLine); }
  }
}
function queCounter(index) {
  let totalQueCounTag = '<span><p>' + index + '</p> of <p>' + questions.length + '</p> Questions</span>';
  bottom_ques_counter.innerHTML = totalQueCounTag;
}
