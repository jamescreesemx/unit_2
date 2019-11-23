<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * These comments are to help you get started.
 * You may split the file and move the comments around as needed.
 *
 * You will find examples of formating in the index.php script.
 * Make sure you update the index file to use this PHP script, and persist the users answers.
 *
 * For the questions, you may use:
 *  1. PHP array of questions
 *  2. json formated questions
 *  3. auto generate questions
 *
 */

session_start();
// Include questions
include('questions.php');

$_SESSION['rand']= $questions;
$_SESSION['answer_button']= [];



// Keep track of which questions have been asked
$track_quest= count($questions);

if(!isset($_SESSION['quest_keep']) || $_SESSION['quest_keep']>=($track_quest-1 )){
    // Show score, I had a hard finding where to place this statement, good thing the instrucstions guided me towards finishing all my conditoionals first
        // If all questions have been asked, give option to show score
                //I went with the route to show scores auto matically

    echo '<h1 style="text-align: center"> You scored: '
    .$_SESSION['correctAll']
    .', because you got '
    .$_SESSION['correctAll'] 
    .' out of '
    .$track_quest
    .' questions right!</h1>';

   
    $_SESSION['quest_keep'] =0;
    $_SESSION['correctAll'] =0;
    //FOR $_SESSION['answer'] I wanted to use a regular variable, Howver that leads to the input not carrying over from page to page
    $_SESSION['answer']=0;
   
   
    $_SESSION['correctAnswer'] =0;

    shuffle($_SESSION['rand']);
//this will hold the position of our shuffled questions
    
    $_SESSION['shuffle'] = $_SESSION['rand'];
    
} else{
    $_SESSION['quest_keep']++;

}
// Show which question they are on
$show_quest = $_SESSION['shuffle'][$_SESSION['quest_keep']];


//this will take in the user input and then validate the answer given from the index.php page
$_SESSION['answer']= filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['correctAnswer']= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT );

// Toast correct and incorrect answers
// Keep track of answers
if(isset( $_SESSION['answer']) &&  $_SESSION['answer'] ==  $_SESSION['correctAnswer']){
    $_SESSION['correctAll'] ++;

    echo '<h1 style="text-align: center"> That is the right answer, You\'re doing GREAT!</h1>';
}elseif(isset( $_SESSION['answer']) &&  $_SESSION['answer'] !=  $_SESSION['correctAnswer']){

    echo '<h1 style="text-align: center">That answer wasn\'t correct, I expect better from you. But It\'s ok &#128513!</h1>';

}


// this will grabeach element and place them into the array they belong to "$show_quest"
array_push(
    $_SESSION['answer_button'],
    $show_quest['correctAnswer'],
    $show_quest['firstIncorrectAnswer'],
    $show_quest['secondIncorrectAnswer']
);

// Shuffle answer buttons
shuffle($_SESSION['answer_button']);
    //Shows shuffled questions
$an1 = $_SESSION['answer_button'][0];

 $an2 = $_SESSION['answer_button'][1];
$an3 = $_SESSION['answer_button'][2];







