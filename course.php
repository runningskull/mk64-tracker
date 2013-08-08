<?php
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
        $next_url = "/course.php?c=" . $course  . "&r=" . ($race + 1);
    } else {
        $next_url = "/";
    }

    if ($race > 0) {
        $prev_url = "/course.php?c=" . $course . "&r=" . ($race-1);
    } else {
        $prev_url = "/";
    }

    $conn = mysql_connect('localhost', 'mk64_tracker', 'mk64_pass_123');
    if (!$conn) {
        print "OH NOES -- " . mysql_error();
        exit;
    }
    mysql_select_db('mk64_tracker');

    $course_sql = "SELECT `time`, `char`, `person`, `time_saved`, `solid` FROM `times` WHERE `is_course`=1 AND `course_id`=$course AND `race_id`=$race ORDER BY id DESC LIMIT 1";
    $result = mysql_query($course_sql);
    $course_info = mysql_fetch_array($result);
    $course_record = $course_info['time'];
    $course_char = $course_info['char'];
    $course_person = $course_info['person'];
    $course_stamp = date('c',strtotime($course_info['time_saved']));
    $course_solid = $course_info['solid'] == 0 ? '' : 'solid';

    $lap_sql = "SELECT `time`, `char`, `person`, `time_saved`, `solid` FROM `times` WHERE `is_course`=0 AND `course_id`=$course AND `race_id`=$race ORDER BY id DESC LIMIT 1";
    $result = mysql_query($lap_sql);
    $lap_info = mysql_fetch_array($result);
    $lap_record = str_pad($lap_info['time'], strlen($course_record), '#', STR_PAD_LEFT);
    $lap_record = str_replace('#', '&nbsp;', $lap_record);
    $lap_char = $lap_info['char'];
    $lap_person = $lap_info['person'];
    $lap_stamp = date('c',strtotime($lap_info['time_saved']));
    $lap_solid = $lap_info['solid'] == 0 ? 'solid' : '';

    mysql_close($conn);
?>

<?php include_once('header.php') ?>

<body id="mk64-tracker">

<div id="wrapper">
    <div class="previous arrow"><a href="<?= $prev_url ?>">&laquo;</a></div>
    <div class="next arrow"><a href="<?= $next_url ?>">&raquo;</a></div>
	<header>
		<h1 class="in-cup">
		    <span><?= $titles[$course] ?></span>
		    <a href="/"><?= $races[$course][$race] ?></a>
		</h1>
	</header>

	<section id="times">
	    <a href="/set.php?c=<?= $course ?>&r=<?= $race ?>&type=course" class="course record">
	        <?= $course_record ?>
	        <div class="imgbox <?= $course_solid ?>">
	        	<img src="/_/img/<?= $course_char ?>.png" alt="<?= $course_char ?>" />
	        </div>
	        <div class="meta">Set <abbr class="timeago" title="<?= $course_stamp ?>">Shiner</abbr> by <span class="player"><?= $course_person ?></span></div>
	    </a>
	    <a href="/set.php?c=<?= $course ?>&r=<?= $race ?>&type=lap" class="lap record">
	        <?= $lap_record ?>
	       	<div class="imgbox <?= $solid ?>">
	            <img src="/_/img/<?= $lap_char ?>.png" alt="<?= $lap_char ?>" />
	        </div>
            <div class="meta">Set <abbr class="timeago" title="<?= $lap_stamp ?>">Shiner</abbr> by <span class="player"><?= $lap_person ?></span></div>
        </a>
	</section>

	<footer>
	    (Click times to edit them) |
        <a href="/">Home</a>
	</footer>

</div>

</body>
