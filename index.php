<?php
require_once "_core.php";
$data=$_POST;// You can change it to `$_GET` easily or as below mix post and get together...
// $data=$_GET;
// foreach($_POST as $key=>$value){
// 	$data[$key]=$value;
// }
if(isset($data["submit"])) {
	$hasError=false;
	if(checkValuesExists($_POST) === false) {
		$hasError=true;
		$message="لطفا تمامی فیلد های فرم را پر کنید.";
		saveLog(0);
	}
	else {
		$values=readValues($_POST);
		if(validValues($values) === false) {
			$hasError=true;
			$message="مقادیر شما مجاز نیست. لطفا فرم را با دقت بررسی و مجدد امتحان کنید.";
			saveLog(0);
		}
		else {
			if($SAVE_USER_ON_FIRST_VIEW === false) {
				prepareUser();
			}
			$values["userID"]=$userID;
			$values["systemID"]=$systemID;
			if($db->insert("answer", $values)) {
				$hasError=false;
				$message="<span>با تشکر از شما\nپاسخ شما با موفقیت درج شد.<br></span><a href=\"result.php\">مشاهده نتایج</a>";
			}
			else {
				$hasError=true;
				$message="مشکلی در ثبت داده شما رخ داده است. لطفا به برنامه نویس اطلاع دهید یا منتشر باشید تا رفع شود.";
				saveLog(1);
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v23.0.0/dist/font-face.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdn.rtlcss.com/mdl/1.2.1/material.rtl.min.css" integrity="sha384-1z92ngOM16ZY2CickWgUrydff0ExYv2Fn8/6WUwsWxgrcJym3w+ogWivpi3nEh0G" crossorigin="anonymous">
		<style>
		* {
			font-family: "Vazir", sans-serif !important;
		}
		body {
			background-color: #f8f8f8;
		}
		.mdl-radio {
			margin-left: 10px;
		}
		.alert {
			padding: 20px;
			color: white;
			margin-bottom: 15px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			float: right;
			width: 94%;
			max-width: 100%;
		}
		.alert span {
			float: right;
		}
		.alert a {
			color: black;
			float: left;
		}
		.alert.green {
			background-color: #4CAF50!important;
		}
		.alert.error {
			background-color: #f44336!important;
		}
		</style>
	</head>
	<body>
		<div class="mdl-grid" dir="rtl">
			<div class="mdl-cell mdl-cell--3-col"></div>
			<div class="mdl-cell mdl-cell--6-col">
				<h1 class="rtl">پرسشنامه</h1>
				<?php if(isset($message) and $message!="") { ?>
				<div class="alert <?php if($hasError === true) { ?>error<?php } else { ?>green<?php } ?>"><?= $message ?></div>
				<?php } ?>
				<div class="mdl-card mdl-shadow--2dp" style="width: 100%; padding: 16px">
					<form action="" method="POST">
						<div class="row">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" id="education-feild" name="educationFeild" />
								<label class="mdl-textfield__label" for="education-feild">رشته تحصیلی</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" id="education-palce" name="educationPlace" />
								<label class="mdl-textfield__label" for="education-place">محل تحصیل</label>
							</div>
						</div>
						<div class="row">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" pattern="[1-9۱۲۳۴۵۶۷۸۹١٢٣٤٥٦٧٨٩][0-9۰۱۲۳۴۵۶۷۸۹٠١٢٣٤٥٦٧٨٩]*" id="age" name="age" />
								<label class="mdl-textfield__label" for="age">سن</label>
								<span class="mdl-textfield__error">این یک فیلد عدد صحیح می‌باشد.</span
				>
			  </div>
			  <div>
				<span>جنسیت:</span>
								<label class="mdl-radio mdl-js-radio" for="male">
									<input type="radio" id="male" name="gender" class="mdl-radio__button" checked value="1" />
									<span class="mdl-radio__label">مرد</span>
								</label>
								<label class="mdl-radio mdl-js-radio" for="female">
									<input type="radio" id="female" name="gender" class="mdl-radio__button" value="0" />
									<span class="mdl-radio__label">زن</span>
								</label>
								<label class="mdl-radio mdl-js-radio" for="untold">
									<input type="radio" id="untold" name="gender" class="mdl-radio__button" value="-1" />
									<span class="mdl-radio__label">مایل به اعلام نیستم</span>
								</label>
							</div>
						</div>
						<div class="row">
							<table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp" style="margin: 20px 10px">
								<thead>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">پرسش</th>
										<th>خیلی زیاد</th>
										<th>زیاد</th>
										<th>متوسط</th>
										<th>کم</th>
										<th>خیلی کم</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="mdl-data-table__cell--non-numeric">
											خودم رو فرد کتابخوانی میدونم.
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question1" value="1" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question1" value="2" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question1" value="3" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question1" value="4" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question1" value="5" />
										</td>
									</tr>
									<tr>
										<td class="mdl-data-table__cell--non-numeric">
											خودم رو فرد ورزشکاری میدونم.
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question2" value="1" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question2" value="2" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question2" value="3" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question2" value="4" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question2" value="5" />
										</td>
									</tr>
									<tr>
										<td class="mdl-data-table__cell--non-numeric">
											خودم رو فرد صادقی میدونم.
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question3" value="1" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question3" value="2" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question3" value="3" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question3" value="4" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question3" value="5" />
										</td>
									</tr>
									<tr>
										<td class="mdl-data-table__cell--non-numeric">
											خودم رو فرد خلاقی میدونم.
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question4" value="1" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question4" value="2" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question4" value="3" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question4" value="4" />
										</td>
										<td>
											<input type="radio" class="mdl-radio__button" name="question4" value="5" />
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<button name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
								ارسال
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://cdn.rtlcss.com/mdl/1.2.1/material.min.js" integrity="sha384-Llr4wcq+yhgKO4ZQRN7Sx88cvQneoOOxcysisJKroD8nKQA7y0NyriabEaMYsvWW" crossorigin="anonymous"></script>
	</body>
</html>