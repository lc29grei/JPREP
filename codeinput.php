<?php
session_start();
// User input
$userInput = $_POST["source"];

// Get dynamic variables needed for out 
// NOTE: USERNAME HAS TO BE GRABBED FROM A DB
// NOTE: METHOD GRABBED FROM DB
// NOTE: TEST CASES GRABBED FROM DB
$userName  = "deniskalic";
$fileName  = $userName . date("mdyhis");
// THESE HAVE TO BE DYNAMICALLY GENERATED
$javaMethod = "sum";
$numOfParams = 2;
$paramString = "testArray[i], testArray[i+1]";
$testArray = "int[] testArray = {5, 4, 9, 1, 1, 2, 2, 8, 10};";

// Format the user input and then create the Java file
$finalSource = "public class " . $fileName . " implements Runnable {\nString resultString = \"\";\npublic void run() {\nrunTest();\n}\npublic static void main(String[] args) {\nThread t = new Thread(new " . $fileName . "());\nt.start();\ntry {\nwhile (t.isAlive()) {\nt.join(1000);\nif (t.isAlive()) throw new Exception();\n}\n}\ncatch (Exception e) {\nt.stop();\nSystem.out.print(\"Your code is inefficient and runs for longer than 1 second.\");\n}\n}\npublic void runTest() {\n" . $testArray . "\nfor (int i = 0; i<testArray.length;i++){\nif(testArray[i+2] == " . $javaMethod . "(" . $paramString . ")) resultString += \"Y,\";\nelse resultString += \"N,\";\ni += " . $numOfParams . ";\n}\nSystem.out.println(resultString);\n}\n" . $userInput . "}";
file_put_contents($fileName . ".java", $finalSource);

// Compile and run the Java program
exec("javac " . $fileName . ".java & java " . $fileName . " 2>&1", $cmdOutput);
$_SESSION['answer'] = implode("", $cmdOutput);

// Clean up
exec("del " . $fileName . ".class");
exec("del " . $fileName . ".java");

header("Location: problem_interface.php");
?>