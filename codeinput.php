<?php
session_start();
// TODO: problemId needs to be passed in so when a $_GET['problemId'] is done it should work!!!! AND lastname and firstname must be available
// DB Info
include 'dbInfo.php';
	

// REALTIME QUERY
$coursePoolSQL = 'SELECT * FROM Problem WHERE problemId="' . $_GET['problemId'] . '"';
// LOCALQUERY
//$coursePoolSQL = 'SELECT * FROM problem WHERE problemId="1"';
$coursePoolSQLResult = mysql_query($coursePoolSQL, $conn);
$row=mysql_fetch_array($coursePoolSQLResult);

// User input
$userInput = $_POST["source"];

// User info
// This is db call when live
$userName  = "" . $_SESSION['first_name'] . $_SESSION['last_name'];
//$userName  = "deniskalic";
$fileName  = $userName . date("mdyhis");

// DB calls for necessary compilation
$javaMethod = $row['methodname'];
$numOfParams = 0;
$paramString = "";
if ($row['param1'] != null and $row['param1'] != "") {
	$paramString = "testArray[i]";
	$numOfParams += 1;
}
if ($row['param2'] != null and $row['param2'] != "") {
	$paramString = $paramString . ", testArray[i+1]";
	$numOfParams += 1;
}
if ($row['param3'] != null and $row['param3'] != "") {
	$paramString = $paramString . ", testArray[i+2]";
	$numOfParams += 1;
}
if ($row['param4'] != null and $row['param4'] != "") {
	$paramString = $paramString . ", testArray[i+3]";
	$numOfParams += 1;
}
if ($row['param5'] != null and $row['param5'] != "") {
	$paramString = $paramString . ", testArray[i+4]";
	$numOfParams += 1;
}

// Test case work here

$typeSQL = 'SELECT resulttype FROM Problem WHERE problemId="'.$_GET['problemId'].'"';
$typeResult = mysql_fetch_array(mysql_query($typeSQL, $conn));
$type=$typeResult[0];



$testArray = $type."[] testArray = {";
$testCaseSQL = 'SELECT * FROM TestCase WHERE problemId="'.$_GET['problemId'].'"';
//$testCaseSQL = 'SELECT * FROM testcase WHERE problemId="1"';
$testCaseSQLResult = mysql_query($testCaseSQL, $conn);
if (mysql_num_rows($testCaseSQLResult) > 0) {
	$fakeBoolean = 0;
	while($testCaseRow=mysql_fetch_array($testCaseSQLResult)) {
		if ($fakeBoolean == 0) {
			if ($testCaseRow['param1value'] != null and $testCaseRow['param1value'] != "") {
				$testArray = $testArray . "" . $testCaseRow['param1value'] . "";
			}
			if ($testCaseRow['param2value'] != null and $testCaseRow['param2value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param2value'] . "";
			}
			if ($testCaseRow['param3value'] != null and $testCaseRow['param3value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param3value'] . "";
			}
			if ($testCaseRow['param4value'] != null and $testCaseRow['param4value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param4value'] . "";
			}
			if ($testCaseRow['param5value'] != null and $testCaseRow['param5value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param5value'] . "";
			}
			$testArray = $testArray . ", " . $testCaseRow['result'] . "";
			$fakeBoolean = 1;
		}
		else {
			if ($testCaseRow['param1value'] != null and $testCaseRow['param1value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param1value'] . "";
			}
			if ($testCaseRow['param2value'] != null and $testCaseRow['param2value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param2value'] . "";
			}
			if ($testCaseRow['param3value'] != null and $testCaseRow['param3value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param3value'] . "";
			}
			if ($testCaseRow['param4value'] != null and $testCaseRow['param4value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param4value'] . "";
			}
			if ($testCaseRow['param5value'] != null and $testCaseRow['param5value'] != "") {
				$testArray = $testArray . ", " . $testCaseRow['param5value'] . "";
			}
			$testArray = $testArray . ", " . $testCaseRow['result'] . "";
		}
	}
}
$testArray = $testArray . "};";

// Format the user input and then create the Java file
$finalSource = "public class " . $fileName . " implements Runnable {\nString resultString = \"\";\npublic void run() {\nrunTest();\n}\npublic static void main(String[] args) {\nThread t = new Thread(new " . $fileName . "());\nt.start();\ntry {\nwhile (t.isAlive()) {\nt.join(1000);\nif (t.isAlive()) throw new Exception();\n}\n}\ncatch (Exception e) {\nt.stop();\nSystem.out.print(\"Your code is inefficient and runs for longer than 1 second.\");\n}\n}\npublic void runTest() {\n" . $testArray . "\nfor (int i = 0; i<testArray.length;i++){\nif(testArray[i+" . $numOfParams . "] == " . $javaMethod . "(" . $paramString . ")) resultString += \"Y,\" + " . $javaMethod . "(" . $paramString . ") + \",\";\nelse resultString += \"N,\" + " . $javaMethod . "(" . $paramString . ") + \",\";\ni += " . $numOfParams . ";\n}\nSystem.out.println(resultString);\n}\n" . $userInput . "}";
file_put_contents($fileName . ".java", $finalSource);

// Compile and run the Java program
exec("javac " . $fileName . ".java", $errorOutput);
exec("chmod 777 " . $fileName);
exec("java " . $fileName . " 2>&1", $cmdOutput);
$_SESSION['answer'] = implode("", $cmdOutput);
$_SESSION['error'] = $errorOutput;
// Clean up
exec("del " . $fileName . ".class");
exec("del " . $fileName . ".java");


header("Location: problem_interface.php?problemId=" . $_GET['problemId']."&assignmentId=".$_GET['assignmentId']);


?>