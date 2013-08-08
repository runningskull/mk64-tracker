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
        $charsplit = $_POST['char'];
        $charsplit = explode('-', $charsplit);
        $char = $charsplit[1];
        $player = $charsplit[0];
        $is_course = $_POST['is_course'];
        $course = $_POST['course'];
        $race = $_POST['race'];
        $solid = $_POST['solid'] == 'solid' ? 1 : 0;

        $return_url = "/course.php?c=$course&r=$race";

        $sql = "INSERT INTO `times` (`time`,`char`,person,is_course,course_id,race_id,solid)";
        $sql .= " VALUES (\"$time\", \"$char\", \"$player\", $is_course, $course, $race, $solid)";
        // print $sql . '<br>';

        $result = mysql_query($sql);
        mysql_close($conn);

        header('Location: '.$return_url);
    } else {
        $is_course = $_GET['type'] == 'course' ? 1 : 0;
        $course = $_GET['c'];
        $race = $_GET['r'];

        $return_url = "/course.php?c=$course&r=$race";
    }
?>

<?php include_once('header.php') ?>

<body id="mk64-tracker">
<div id="wrapper">
	<header>
		<h1 class="in-cup">
		    <span><?= $titles[$course] ?> Cup</span>
		    <a href="/"><?= $races[$course][$race] ?></a>
		</h1>
	</header>
	
    <form id="time-set" action="" method="POST">
        <fieldset id="set-time">
            <input name="time-minute" type="tel" placeholder="min" autofocus> :
            <input name="time-second" type="tel" placeholder="sec"> :
            <input name="time-sub" type="tel" placeholder="trilli">
        </fieldset>
        <fieldset id="set-char">
            <select name="char">
            	<option value="JR-toad">JR - Toad</option>
            	<option value="Greg-peach">Greg - Peach</option>
            	<option value="Andy-peach">Andy - Peach</option>
            	<option value="Greg-wario">Greg - Wario</option>
            </select>
            <input type="checkbox" value="solid" id="solid" name="solid"></input><label for="solid">Beatable</label>
        </fieldset>
        <input type="hidden" name="course" value="<?= $course ?>">
        <input type="hidden" name="race" value="<?= $race ?>">
        <input type="hidden" name="is_course" value="<?= $is_course ?>">
        <fieldset id="submit-time">
            <input name="submit" type="submit" value="Update Time">
            or <a href="<?= $return_url ?>" ?>cancel</a>
        </fieldset>
    </form>

    <footer>
        <a href="/">Home</a>
    </footer>
</div>
</body>
</html>
