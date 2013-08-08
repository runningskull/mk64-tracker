<?php
    $titles = array('Mushroom', 'Flower', 'Star', 'Special');
    $races = array(
        array('Luige', 'Moo to the Mizow', 'The Beach', 'Kalihari'),
        array('Todd\'s Turnpike', 'Frappe Snowland', 'Choke-o Mountain', 'Mario Raceway'),
        array('Wario Stadium', 'Sorbetland', 'Raceway Royale', 'Bowser\'s Castle'),
        array('DK Parkway', 'Yosh Valley', 'Banshee Boardwalk', 'Never-Play'),
    );

    $course = $_GET['c'] ;

    if ( isset($_GET['r']) ) {
        $race = $_GET['r'];
    } else {
        $race = 0;
    }

    $race_title = $races[$course][$race];

    $lap_record = str_pad($lap_record, strlen($course_record), '#', STR_PAD_LEFT);
    $lap_record = str_replace('#', '&nbsp;', $lap_record);

    if ($race < 3) {
        $next_url = "#race-" . $course  . "-" . ($race + 1);
    } else {
        $next_url = "#wrapper-home";
    }

    if ($race > 0) {
        $prev_url = "#race-" . $course . "-" . ($race-1);
    } else {
        $prev_url = "#wrapper-home";
    }

    $conn = mysql_connect('localhost', 'mk64_tracker', 'mk64_pass_123');
    if (!$conn) {
        print "OH NOES -- " . mysql_error();
        exit;
    }
    mysql_select_db('mk64_tracker');

    $course_sql = "SELECT `time`, `char`, `person` FROM `times` WHERE `is_course`=1 AND `course_id`=$course AND `race_id`=$race ORDER BY id DESC LIMIT 1";
    $result = mysql_query($course_sql);
    $course_info = mysql_fetch_array($result);
    $course_record = $course_info['time'];
    $course_char = $course_info['char'];
    $course_person = $course_info['person'];

    $lap_sql = "SELECT `time`, `char`, `person` FROM `times` WHERE `is_course`=0 AND `course_id`=$course AND `race_id`=$race ORDER BY id DESC LIMIT 1";
    $result = mysql_query($lap_sql);
    $lap_info = mysql_fetch_array($result);
    $lap_record = str_pad($lap_info['time'], strlen($course_record), '#', STR_PAD_LEFT);
    $lap_record = str_replace('#', '&nbsp;', $lap_record);
    $lap_char = $lap_info['char'];
    $lap_person = $lap_info['person'];

    mysql_close($conn);
?>

<div id="race-<?= $course ?>-<?= $race ?>" class="wrapper">
    <div class="previous arrow"><a href="<?= $prev_url ?>">&laquo;</a></div>
    <div class="next arrow"><a href="<?= $next_url ?>">&raquo;</a></div>
	<header>
		<h1 class="in-cup">
		    <span><?= $titles[$course] ?></span>
		    <a href="/"><?= $races[$course][$race] ?></a>
		</h1>
	</header>

	<section id="times">
	    <a href="#set-<?= $course ?>-<?= $race ?>-course" class="course record">
	        <?= $course_record ?>
	        <img src="/_/img/<?= $course_char ?>.png" alt="<?= $course_char ?>" />
	    </a>
	    <a href="#set-<?= $course ?>-<?= $race ?>-course" class="lap record">
	        <?= $lap_record ?>
            <img src="/_/img/<?= $lap_char ?>.png" alt="<?= $lap_char ?>" />
        </a>
	</section>

	<footer>
	    (Click times to edit them) |
        <a class="homelinka" href="#wrapper-home">Home</a>
	</footer>

</div>
