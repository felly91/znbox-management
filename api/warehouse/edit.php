<?php 
require __DIR__."/../../autoload.php";

use controller\Translator;
use controller\User;
use controller\Warehouse;
use controller\Helper;

if(!$user = User::getBy("id", User::validate_token($_SESSION["token"])["user_id"])) {
	die(json_encode([
		"code" => "5000",
		"title" => Translator::translate("Error"),
		"message" => Translator::translate("Session Expired"),
		"status" => "danger",
	]));
}

if(
	!isset($_POST["value"]) ||
	!isset($_POST["id"])
) {
	die(json_encode([
		"code" => "5000",
		"title" => Translator::translate("Error"),
		"message" => Translator::translate("Invalid request"),
		"status" => "danger",
	]));
}

if(!$warehouse = Warehouse::getBy("id", $_POST["id"])) {
	die(json_encode([
		"code" => "5000",
		"title" => Translator::translate("Error"),
		"message" => Translator::translate("Session Expired"),
		"status" => "danger",
	]));
}
$data = $_POST["value"];
$data["user_modify"] = $user["id"];

if(Warehouse::update($_POST["id"], $data)) {
	die(json_encode([
		"code" => "1102",
		"title" => Translator::translate("Success"),
		"message" => Translator::translate("Updated successfuly"),
		"status" => "success",
		"href" => Helper::url("api/warehouse/warehouse.php"),
	]));
} else {
	die(json_encode([
		"code" => "1103",
		"title" => Translator::translate("Server error"),
		"message" => Translator::translate("Error do servidor"),
		"status" => "danger",
	]));
}