<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
	$user = new EventData();
	$user->title = $_POST["title"];
	$user->brief = $_POST["brief"];
	$user->content = $_POST["content"];

	$user->start_at = $_POST["start_at"];
	$user->finish_at = $_POST["finish_at"];

	$image = "";
	$img = new Upload($_FILES["image"]);
	if($img->uploaded){
		$img->Process("uploads/");
		if($img->processed){
			$image = $img->file_dst_name;
		}
	}
	$user->image = $image;
	$user->category_id = $_POST["category_id"];
	$user->add();
	//Core::redir("./?view=events");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	$user = EventData::getById($_POST["user_id"]);
	$user->title = $_POST["title"];
	$user->brief = $_POST["brief"];
	$user->content = $_POST["content"];

	$user->start_at = $_POST["start_at"];
	$user->finish_at = $_POST["finish_at"];


	$image = $user->image;
	$img = new Upload($_FILES["image"]);
	if($img->uploaded){
		$img->Process("uploads/");
		if($img->processed){
			$image = $img->file_dst_name;
		}
	}
	$user->image = $image;

	$user->category_id = $_POST["category_id"];
	$user->status = isset($_POST["status"])?1:0;

	$user->update();
	Core::redir("./?view=events");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$category = EventData::getById($_GET["id"]);
	$category->del();
	Core::redir("./index.php?view=events");
}

?>