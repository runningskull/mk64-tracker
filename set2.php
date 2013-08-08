<?php
    if ( isset($_POST['submit']) ) {
        $conn = mysql_connect('localhost', 'mk64_tracker', 'mk64_pass_123');
        if (!$conn) {
            print "OH NOES -- " . mysql_error();
            exit;
        }
        mysql_select_db('mk64_tracker');

        $min = str_pad($_POST['time-minute'], 2, '0', STR_PAD_LEFT);
        $sec = str_pad($_POST['time-second'], 2, '0', STR_PAD_LEFT);
        $sub = str_pad($_POST['time-sub'], 2, '0', STR_PAD_LEFT);

        $time = $min . ':' . $sec . ':' . $sub;
        $char = $_POST['char'];
        $player = $_POST['player'];
        $is_course = $_POST['is_course'];
        $course = $_POST['course'];
        $race = $_POST['race'];

        $return_url = "#race-$course-$race";

        $sql = "INSERT INTO `times` (`time`,`char`,person,is_course,course_id,race_id)";
        $sql .= " VALUES (\"$time\", \"$char\", \"$player\", $is_course, $course, $race)";
        // print $sql . '<br>';

        $result = mysql_query($sql);
        mysql_close($conn);

/*         header('Location: '.$return_url); */
    } else {
        $is_course = $_GET['type'] == 'course' ? 1 : 0;
        $course = $_GET['c'];
        $race = $_GET['r'];

        $return_url = "#race-$course-$race";
    }
?>

<div id="set-<?= $course ?>-<?= $race ?>-<?= $is_course ? 'course' : 'lap' ?>" class="wrapper">
	<header>
		<h1 class="in-cup">
		    <span><?= $titles[$course] ?> Cup</span>
		    <a href="/"><?= $races[$course][$race] ?></a>
		</h1>
	</header>

    <form class="form" action="/set.php" method="POST">
        <fieldset id="set-time">
            <input name="time-minute" type="tel" placeholder="min" autofocus> :
            <input name="time-second" type="tel" placeholder="sec"> :
            <input name="time-sub" type="tel" placeholder="trilli">
        </fieldset>
        <fieldset id="set-char">
            <select name="char">
                <option value="toad">Toad</option>
                <option value="peach">Peach</option>
                <option value="luigi">Luigi</option>
                <option value="mario">Mario</option>
                <option value="yoshi">Yoshi</option>
                <option value="dk">DK</option>
                <option value="wario">Wario</option>
                <option value="bowser">Bowser</option>
            </select>
            <input type="text" name="player" placeholder="Player's Name">
        </fieldset>
        <input type="hidden" name="course" value="<?= $course ?>">
        <input type="hidden" name="race" value="<?= $race ?>">
        <input type="hidden" name="is_course" value="<?= $is_course ?>">
        <fieldset id="submit-time">
            <a name="submit" class="submit whiteButton" type="submit" href="<?= $return_url ?>">Submit New Time</a>
            or <a class="recordback" href="<?= $return_url ?>" ?>cancel</a>
        </fieldset>
    </form>

    <footer>
        <a class="homelinka" href="#wrapper-home">Home</a>
    </footer>
</div>
