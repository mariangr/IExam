<?php
require_once('../models/TestAnswerModel.php');
require_once('APIBase.php');

function insert()
{
	Permissions::OnlyAuthenticated();
	
	$username = $_SESSION['SESS_USERNAME'];
	$questionId = $_GET['questionId'];
	$answer = $_GET['answer'];
	
	$answerModel = new TestAnswerModel;
	
	$query = $answerModel->getItems("WHERE username = '$username' AND question_id = '$questionId'");
	
	$result = false;
	if(count($query) > 0)
	{
		$query[0]->answer = $answer;
		$result = $query[0]->update();
	}
	else
	{
		$answerModel->username = $username;
		$answerModel->questionId = $questionId;
		$answerModel->answer = $answer;
		
		$result = $answerModel->insert();
	}
	
	if($result)
	{
		return 'Success';
	}
	
	return 'Error';
}
?>