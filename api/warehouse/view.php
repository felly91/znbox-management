<?php 
require __DIR__."/../../autoload.php";

use controller\Translator;
use controller\User;
use controller\Warehouse;
use controller\Helper;

if(!$user = User::getBy("id", User::validate_token($_SESSION["token"])["user_id"])) {
    die("user_session");
}

if(!isset($_GET["id"])) {
    die("404_request");
}

if(!$fetch = Warehouse::getBy("id", $_GET["id"])) {
    die("404_request");   
}
?>

<div class="ui modal tiny">
    <i class="ui close icon"></i>
	<div class="header">
		<h3 class="ui header diviving color red"><i class="ui warehouse icon"></i><?=Translator::translate("Warehouse");?></h3>
	</div>
	<div class="scrolling content">
		<table class="ui small table selectable celled striped">
			<thead></thead>
			<tbody>
                <tr>
                    <td><strong><?=Translator::translate("Id");?>:</strong></td>
                    <td><?=$fetch["id"]?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("Name");?>:</strong></td>
                    <td><?=$fetch["name"]?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("Address");?>:</strong></td>
                    <td><?=$fetch["address"]?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("Date Added");?>:</strong></td>
                    <td><?=Helper::datetime($fetch["date_added"])?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("User Added");?>:</strong></td>
                    <td><?=User::getBy("id", $fetch["user_added"])["username"]?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("Date Modify");?>:</strong></td>
                    <td><?=Helper::datetime($fetch["date_modify"])?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("User Modify");?>:</strong></td>
                    <td><?=User::getBy("id", $fetch["user_modify"])["username"]?></td>
                </tr>
                <tr>
                    <td><strong><?=Translator::translate("Description");?>:</strong></td>
                    <td><?=nl2br($fetch["description"])?></td>
                </tr>
            </tbody>
		</table>
	</div>
	<div class="actions stackable">
        <div class="ui negative labeled icon button mini">
            <?=Translator::translate("close")?>
            <i class="close inverted icon"></i>
        </div>
	</div>
</div>