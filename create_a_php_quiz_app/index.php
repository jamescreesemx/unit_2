

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

    <?php
include('inc/quiz.php');
//to account for name="answer" in the user input
$_POST['answer'];
//to account for name="id" in hidden feild
$_POST['id'];
?>

</head>


<body style="background-color: #5208c4">
    <div class="container">
        <div id="quiz-box" style="text-align: center">
            <p class="breadcrumbs">Question <?php echo $_SESSION['quest_keep'] +1 
                ." of "
                .$track_quest; ?> </p>
            <p class="quiz">What is <?php echo $show_quest['leftAdder']
                                .' + '
                                .$show_quest['rightAdder']
                                .'?';
            ?></p>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $show_quest['correctAnswer']; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $an1;?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $an2;?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $an3;?>" />
            </form>
        </div>
    </div>
    <!-- I wanted to get a little funcky with these-->
    <img src="https://media1.giphy.com/media/l1J9LxVGTBa8DS3pC/giphy.gif" width="128" height="128" style="position: absolute;
    top: 0px;
    right: 0px;
    border-radius: 50%">
    <img src="https://i.pinimg.com/originals/50/0b/d3/500bd3de21a005b07eaf5b47390faa7b.gif" width="128" height="128"  style="position: absolute;
    bottom: 0px;
    left: 0px;
    border-radius: 50%" >

    <!-- imgage edits from: https://www.w3schools.com/html/html_images.asp -->
</body>
</html>