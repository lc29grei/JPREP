<?php
	
	function displayQuestionPool($currentrole)
	{
		if ($currentrole=="f") {
			echo 
			'
			<div class="qpool">
				<p>Click a link to view that question pool</p>
				<a href="./private_pool.php#tab3"><u>Private</u></a><br>
				<p><b><u>Current Courses</u></b></p>
				<a href="./course_pool.php#tab3"><u>Course 1</u></a><br>
				<a href="./course_pool.php#tab3"><u>Course 2</u></a><br>
				<a href="./course_pool.php#tab3"><u>Course 3</u></a><br>
				<p><b><u>Previous Courses</u></b></p>
				<a href="./course_pool.php#tab3"><u>Course 4</u></a><br>
				<a href="./course_pool.php#tab3"><u>Course 5</u></a><br>
			</div>
			';
		} else {
			echo 
			'
			<div class="qpool">
				<p>Click a link to view that question pool</p>
				<p><b><u>Current Courses</u></b></p>
				<a href="./course_pool.php#tab3"><u>Course 1</u></a><br>
				<a href="./course_pool.php#tab3"><u>Course 2</u></a><br>
				<a href="./course_pool.php#tab3"><u>Course 3</u></a><br>
				<p><b><u>Previous Courses</u></b></p>
				<a href="./course_pool.php#tab3"><u>Course 4</u></a><br>
				<a href="./course_pool.php#tab3"><u>Course 5</u></a><br>
			</div>
			';
		}
	}
?>






