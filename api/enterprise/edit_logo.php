<?php 

	require __DIR__."/../../autoload.php";

	use controller\User;
	use controller\UserType;
	use controller\Enterprise;
	use controller\Translator;

	if(!$user = User::getBy('id', User::validate_token($_SESSION['token'])['user_id'])->first) {
		echo json_encode([
			'code' => '5000',
			'title' => Translator::translate("Error"),
			'message' => Translator::translate("Session Expired"),
			'status' => 'danger',
		]); die();
	}

	$logo = md5(time().$_FILES['logo']['name']);
	$picPath = __DIR__."/../../res/uploads/".$logo;

	$allowed = array('png', 'jpg', 'gif');
		
	$extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo json_encode([
			'code' => '1106',
			'title' => Translator::translate("Image format not allowed"),
			'message' => Translator::translate("Image format not allowed"),
			'status' => 'danger',
		]); die();
	}

	$_POST = array(
		'logo' => $logo.".$extension",
		'user_modify' => $user->id,
		'date_modify' => date("Y-m-d h:i:s"),
	);

	$enterprise = Enterprise::getAll()->first;

	if(move_uploaded_file($_FILES['logo']['tmp_name'], __DIR__."/../../assets/img/".$logo.".$extension")) {
		if(Enterprise::update($enterprise->id, $_POST)) {
			/* Delete current logo from server */
			if(file_exists(__DIR__."/../../assets/img/".$enterprise->logo)) {
				unlink(__DIR__."/../../assets/img/".$enterprise->logo);
			}
			echo json_encode([
				'code' => '1102',
				'title' => Translator::translate("Success"),
				'message' => Translator::translate("Updated successfuly"),
				'status' => 'success',
				'href' => 'enterprise/enterprise',
			]); die();
		} else {
			echo json_encode([
				'code' => '1103',
				'title' => Translator::translate("Server error"),
				'message' => Translator::translate("Error do servidor"),
				'status' => 'danger',
			]); die();
		}
	} else {
		echo json_encode([
			'code' => '1103',
			'title' => Translator::translate("Server error"),
			'message' => Translator::translate("Error do servidor"),
			'status' => 'danger',
		]); die();
	}