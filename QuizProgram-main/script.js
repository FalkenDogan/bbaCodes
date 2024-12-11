/*
Quizzer made by Kishabub 
- Handles single or multiple choice questions
- Create question sets using the json format below
- Set the question set by changing "activeQuestionSetIndex"

Json layout
question_sets = [
	{
		"name": <string>,
		"randomize_question_order": <bool>,
		"randomize_option_order": <bool>,
		"is_quiz": <bool>, // score will not be seen until end if it's a quiz
		"questions": [
			{
				"title": <string>,
				"points": [ {correct}<int> {partial correct}<int> {wrong}<int> ],
				"answer_status": <int>, // 0 = correct, 1 = partially correct, 2 = incorrect
				"options": [
					{
						"name": <string>,
						"correct": <bool>,
						"selected": <bool>, // handled by quizzer
					}
				]
			}
		]
	}
]
*/

/*
const questionSets = [
	{
		"name": "General Knowledge Quiz",
		"randomize_question_order": true,
		"randomize_option_order": true,
		"is_quiz": true,
		"questions": [
			{
				"title": "What is the largest country in terms of land mass?",
				"points": [ 25, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Russia",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Canada",
						"correct": false,
						"selected": false,
					},
					{
						"name": "U.S.A.",
						"correct": false,
						"selected": false,
					},
					{
						"name": "China",
						"correct": false,
						"selected": false,
					}
				]
			},
			{
				"title": "Which of the following are palindromes?",
				"points": [ 20, 10, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Racecar",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Civic",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Costly",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Neatly",
						"correct": false,
						"selected": false,
					}
				]
			},
			{
				"title": "What does the chemical symbol 'Au' stand for?",
				"points": [ 15, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Gold",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Silver",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Copper",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Aluminium",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Tin",
						"correct": false,
						"selected": false,
					},
				]
			},
			{
				"title": "What country has the most lakes?",
				"points": [ 20, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Russia",
						"correct": false,
						"selected": false,
					},
					{
						"name": "India",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Canada",
						"correct": true,
						"selected": false,
					},
					{
						"name": "U.S.A",
						"correct": false,
						"selected": false,
					},
				]
			},
			{
				"title": "What language(s) was this program made in? ;)",
				"points": [ 5, 5, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Javascript",
						"correct": true,
						"selected": false,
					},
					{
						"name": "CSS",
						"correct": true,
						"selected": false,
					},
					{
						"name": "HTML",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Java",
						"correct": false,
						"selected": false,
					},
				]
			},
			{
				"title": "Who founded Microsoft?",
				"points": [ 20, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Bill Gates",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Steve Jobs",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Jeff Bezos",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Mark Zuckerberg",
						"correct": false,
						"selected": false,
					},
				]
			},
			{
				"title": "What country did sushi originate from?",
				"points": [ 20, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Japan",
						"correct": true,
						"selected": false,
					},
					{
						"name": "China",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Korea",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Vietnam",
						"correct": false,
						"selected": false,
					},
				]
			},
			{
				"title": "What game studio created the Red Dead Redepmtion series?",
				"points": [ 20, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Activision Blizzard",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Origin",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Riot Games",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Rockstar Games",
						"correct": true,
						"selected": false,
					},
				]
			},
			{
				"title": "Which of the following are browsers?",
				"points": [ 20, 10, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "Google Chrome",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Opera GX",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Tellers",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Chromium",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Firefox",
						"correct": true,
						"selected": false,
					},
					{
						"name": "DuckDuckGo",
						"correct": true,
						"selected": false,
					},
				]
			},
			{
				"title": "What operating system does the Google Pixel phone use?",
				"points": [ 20, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "iOS",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Windows OS",
						"correct": false,
						"selected": false,
					},
					{
						"name": "Android OS",
						"correct": true,
						"selected": false,
					},
					{
						"name": "Linux",
						"correct": false,
						"selected": false,
					},
				]
			},
			{
				"title": "When was the internet invented?",
				"points": [ 20, 0, 0 ],
				"answer_status": 0,
				"options": [
					{
						"name": "1983",
						"correct": true,
						"selected": false,
					},
					{
						"name": "1982",
						"correct": false,
						"selected": false,
					},
					{
						"name": "1981",
						"correct": false,
						"selected": false,
					},
					{
						"name": "1992",
						"correct": false,
						"selected": false,
					},
				]
			},
		]
	}
];
*/
const XLSX = require('xlsx');

// Excel dosyasını okuyun
function readExcelFile(filePath, sheetName, questionColumn, answerColumn) {
    const workbook = XLSX.readFile(filePath);
    const sheet = workbook.Sheets[sheetName];
    const data = XLSX.utils.sheet_to_json(sheet, { header: 1 });

    const questions = [];
    for (let i = 1; i < data.length; i++) {
        const row = data[i];
        const question = row[questionColumn];
        const answer = row[answerColumn];

        if (question && answer) {
            questions.push({
                title: question,
                points: [20, 10, 0],
                answer_status: 0,
                options: [
                    {
                        name: answer,
                        correct: true,
                        selected: false,
                    },
                    // Diğer seçenekler burada eklenebilir
                ]
            });
        }
    }

    return questions;
}

// Excel dosyasından verileri alın
const filePath = 'C:/Users/smust/Desktop/vocabulary.xlsx';
const sheetName = 'Sheet1';
const questionColumn = 0; // Sorunun bulunduğu sütun
const answerColumn = 1; // Cevabın bulunduğu sütun

const questionsFromExcel = readExcelFile(filePath, sheetName, questionColumn, answerColumn);

// questionSets yapısını güncelleyin
const questionSets = [
    {
        name: "Excel Quiz",
        randomize_question_order: true,
        randomize_option_order: true,
        is_quiz: true,
        questions: questionsFromExcel
    }
];

// html element reference
const root = document.querySelector(":root");
const questionSetLabel = document.getElementById("questionSetLabel");
const optionList = document.getElementById("optionList");
const questionLabel = document.getElementById("questionLabel");
const submitButton = document.getElementById("submitButton");
const accuracyProgressBarLabel = document.getElementById("accuracyProgressBarLabel");
const summaryDetails = document.getElementById("summaryDetails");
const summaryQuestionHistoryList = document.querySelector(".summary-question-history-list");

const gameplaySection = document.getElementById("gameplay");
const endScreen = document.querySelector(".end-screen");

// user defined
const activeQuestionSetIndex = 0; // prompt("which question set?") 

// gameplay
let activeQuestionSet = questionSets[activeQuestionSetIndex]; 
let activeQuestion = null;
let questions = []; // all questions
let answeredQuestions = []; // questions that are answered

let selectedOptions = []; // will only allow for one if the question isn't multiple select
let correctOptions = []; // within the question
let submitAvailable = false;
let currentPoints = 0; // current amount of points the user has
let totalPoints = 0; // total amount of points in the set

window.addEventListener("load", start);

// TEMPORARY
window.addEventListener("keydown", (key) => {
	// switch question
	if (key.keyCode == 32) { // space
		displayQuestionSet(activeQuestionSet);
	}
})

// on window load
function start() {
	displayQuestionSet();
}

// display a question set at a certain index
function displayQuestionSet() {
	questions = activeQuestionSet.questions;
	answeredQuestions = [];
	
	// calculate total points
	totalPoints = 0;
	activeQuestionSet.questions.forEach(question => {
		totalPoints += question.points[0];
	});
	
	submitButton.addEventListener("click", () => {
		if (submitAvailable) {
			submit();
		}
	});
	
	questionSetLabel.innerText = activeQuestionSet.name;
	displayQuestion();
}

function displayQuestion() {
	if (questions.length == 0) {
		endGame();
		return;
	}
	
	activeQuestion = activeQuestionSet.randomize_question_order ? questions[Math.floor(Math.random() * questions.length)] : questions[0];
	correctOptions = activeQuestion.options.filter(option => option.correct);
	
	// randomly sort options
	if (activeQuestionSet.randomize_option_order) {
		const randomly = () => Math.random() - 0.5;
		activeQuestion.options = [].concat(activeQuestion.options).sort(randomly);  
	}
	
	let optionElements = [];
	
	// setup html
	questionLabel.innerText = `${activeQuestionSet.questions.length - (activeQuestionSet.questions.length - questions.length) + 1}. ${activeQuestion.title}`;
	
	// to reset styles
	optionList.innerHTML = ""; // clear html
	activeQuestion.options.forEach(option => {
		const optionElement = document.createElement("div");
		optionElement.classList.add("option");

		const checkbox = document.createElement("input");
		checkbox.type = "checkbox";
		checkbox.classList.add("option-checkbox");
		checkbox.disabled = true;
		optionElement.appendChild(checkbox);

		const optionLabel = document.createElement("p");
		optionLabel.classList.add("option-label");
		optionLabel.innerText = option.name;
		optionElement.appendChild(optionLabel);

		optionList.appendChild(optionElement);
		optionElements.push(optionElement);

		// click events
		optionElement.addEventListener("click", () => {
			// deselect
			if (selectedOptions.includes(option)) {
				optionElement.classList.remove("option-selected");
				checkbox.checked = false;

				selectedOptions.splice(selectedOptions.indexOf(option), 1);
			}
			// select
			else {
				// only one correct answer, clear array
				if (correctOptions.length <= 1) {
					selectedOptions = [];

					optionElements.forEach(element => {
						element.classList.remove("option-selected"); 
						element.querySelector(".option-checkbox").checked = false;
					});
				}

				selectedOptions.push(option); 
				optionElement.classList.add("option-selected");
				checkbox.checked = true;
			}

			// submit available
			if (selectedOptions.length > 0) {
				submitButton.classList.add("submit-button-enabled");
				submitButton.classList.remove("submit-button-disabled");
				submitAvailable = true;
			} 
			// submit not available 
			else {
				submitButton.classList.add("submit-button-disabled");
				submitButton.classList.remove("submit-button-enabled");
				submitAvailable = false;
			}
		});
	});
}

function submit() {
	points = 0; 
	correctSelectedAnswers = 0; // must be same as correct answers for full credit
	partialCredit = false;
	
	selectedOptions.forEach(option => {
		option.selected = true; // set selected option = true in the json
		
		if (correctOptions.includes(option)) {
			partialCredit = true; // at least partial points
			
			if (correctSelectedAnswers == 0)
				points = activeQuestion.points[0]; // assume all correct if that's the first answer
			
			correctSelectedAnswers++;
		}
		else {
			if (partialCredit) {
				points = activeQuestion.points[1];
			}
			else {
				points = activeQuestion.points[2]; 
			}
		}
	});
	
	if (correctOptions.length != correctSelectedAnswers) {
		if (partialCredit) {
			points = activeQuestion.points[1];
		}
		else {
			points = activeQuestion.points[2];
		}
	}

	currentPoints += points;
	
	nextQuestion(points, activeQuestion.points[0]); 	
}

function nextQuestion(pointsGained, pointsTotal) {
	correctPercentage = points/activeQuestion.points[0]; // determine answer status message
	
	// correct
	if (correctPercentage == 1) {
		activeQuestion.answerStatus = 0;
	}
	// partially correct
	else if (correctPercentage > 0) {
		activeQuestion.answerStatus = 1;
	// incorrect
	} else {
		activeQuestion.answerStatus = 2;
	}
	
	// remove question from full list and add to answered question
	answeredQuestions.push(activeQuestion);
	questions.splice(questions.indexOf(activeQuestion), 1);
	
	// show score 
	if (!activeQuestionSet.is_quiz) {
		answerStatus = "Incorrect"; // "You are partially correct.", "Correct!"
		
		if (correctPercentage > 0) {
			answerStatus = "You are partially correct.";
		}
		if (correctPercentage == 1) {
			answerStatus = "Correct!";
		}
		
		alert(`${answerStatus} +${pointsGained}/${pointsTotal}\n${currentPoints}/${totalPoints}\nQuestions Left: ${questions.length}`);
	}
	
	// auto displays new question - handles randomized
	displayQuestion();
}

function endGame() {
	gameplaySection.style.display = "none"; // hide
	endScreen.style.display = "block"; // show
	
	accuracy = Math.round((currentPoints/totalPoints * 100));
	accuracyProgressBarLabel.innerText = `${accuracy}%`;
	root.style.setProperty("--bar-accuracy-percent", `${accuracy}%`);
	
	// set correct/partial/incorrect labels
	let correctQuestions = [];
	let partiallyCorrectQuestions = [];
	let incorrectQuestions = [];
	
	correctQuestions = answeredQuestions.filter(question => question.answerStatus == 0);
	partiallyCorrectQuestions = answeredQuestions.filter(question => question.answerStatus == 1);
	incorrectQuestions = answeredQuestions.filter(question => question.answerStatus == 2);
	
	summaryDetails.innerHTML = `${currentPoints}/${totalPoints}<br>${correctQuestions.length} correct<br>${partiallyCorrectQuestions.length} partially correct<br>${incorrectQuestions.length} incorrect`;
	
	// create the question history cards
	summaryQuestionHistoryList.innerHTML = "";
	answeredQuestions.forEach(question => {
		// create options for the question
		let optionsHTML = "";
		question.options.forEach(option => {
			optionsHTML += `
				<div class="summary-question-option ${option.correct ? 'correct' : 'incorrect'} ${option.selected ? 'selected' : ''}">
					<p>${option.name}</p>
				</div>`
		});
		
		summaryQuestionHistoryList.innerHTML += 
			`<div class="summary-question">
				<p class="summary-question-name">(${question.points[question.answerStatus]}/${question.points[0]}) ${question.title}</p>
				<div class="summary-question-option-list">
					${optionsHTML}
				</div>
			</div>`;
	});
}