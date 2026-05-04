<?php
include 'config.php';
// جلب الأسئلة من MySQL
$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
$questions_array = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $questions_array[] = [
            'question' => $row['question_text'],
            'answer' => $row['option' . $row['correct_ans']],
            'options' => [$row['option1'], $row['option2'], $row['option3'], $row['option4']]
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div class="start_btn"><button>Start Quiz</button></div>

    <div class="info_box">
        <div class="info-title"><span>Rules for the quiz</span></div>
        <div class="info-list">
            <div class="info">1. Once you select your answer, it can't be undone.</div>
            <div class="info">2. 15 seconds per question.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <div class="quiz_box">
        <header>
            <div class="title">Quizo</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text"></div>
            <div class="option_list"></div>
        </section>
        <footer>
            <div class="total_que"></div>
            <button class="next_btn">Next Question</button>
        </footer>
    </div>

    <div class="result_box">
        <div class="score_text"></div>
        <div class="buttons">
            <button class="quit" onclick="location.href='index.php'">Quit</button>
        </div>
    </div>

    <script>
        // الأسئلة بتتحقن هنا من PHP لـ JS مباشرة
        let questions = <?php echo json_encode($questions_array); ?>;
    </script>
    <script src="script.js"></script> </body>
</html>