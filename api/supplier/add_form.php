<?php 
require __DIR__."/../../autoload.php";

use controller\Translator;
use controller\User;
use controller\Supplier;
use controller\Helper;

if(!$user = User::getBy("id", User::validate_token($_SESSION["token"])["user_id"])) {
    die("user_session");
}
?>

<form class="ui small modal form zn-form" action="<?=Helper::url("api/supplier/add.php")?>" data="1">
	<div class="header">
		<h3 class="ui header diviving color red"><i class="ui dolly flatbed icon"></i><?=Translator::translate("add supplier");?></h3>
	</div>
	<div class="scrolling content">
		<div class="ui field required">
			<label><?=Translator::translate("Name");?>:</label>
			<input type="text" name="value[name]" autocomplete="off" placeholder="<?=Translator::translate("Name");?>">
		</div>
		<div class="ui field">
			<label><?=Translator::translate("Contact");?>1:</label>
			<input type="text" name="value[contact1]" autocomplete="off" placeholder="">
		</div>
		<div class="ui field">
			<label><?=Translator::translate("Contact");?>2:</label>
			<input type="text" name="value[contact2]" autocomplete="off" placeholder="">
		</div>
		<div class="ui field">
			<label><?=Translator::translate("Email");?>:</label>
			<input type="email" name="value[email]" autocomplete="off" placeholder="<?=Translator::translate("Email");?>">
		</div>
		<div class="ui field">
			<label><?=Translator::translate("Address");?>:</label>
			<input type="text" name="value[address]" autocomplete="off" placeholder="<?=Translator::translate("Address");?>">
		</div>
		<div class="ui field">
			<label><?=Translator::translate("Website");?></label>
			<input type="url" name="value[website]" autocomplete="off" placeholder="https://">
		</div>
		<div class="ui field">
			<label><?=Translator::translate("Observation");?>:</label>
			<textarea placeholder="<?=Translator::translate("Observation");?>" name="value[observation]"></textarea>
		</div>
	</div>
	<div class="actions stackable">
		<button class="ui primary labeled icon button mini" type="submit">
            <?=Translator::translate("add");?>
            <i class="checkmark inverted icon"></i>
        </button>
        <div class="ui negative labeled icon button mini">
            <?=Translator::translate("cancel");?>
            <i class="close inverted icon"></i>
        </div>
	</div>
	<script type="text/javascript">
			$("form").form({
				on:"blur",
				inline:true,
				fields:{
					name:{
						identifier:"value[name]",
						rules:[{
							type:"empty",
							prompt:"{name} <?=Translator::translate("Please fill this field")?>"
						}]
					}
				}
			});
	</script>
</form>