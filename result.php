<?php
require_once "_core.php";
$gm=$db->count("answer", ["gender"=>1], "GROUP BY `systemID`");
$gf=$db->count("answer", ["gender"=>0], "GROUP BY `systemID`");
$gn=$db->count("answer", ["gender"=>-1], "GROUP BY `systemID`");
// $gt=5;
// $gr1=($g1 / $gt) * 360; // male
// $gr2=($g2 / $gt) * 360; // female
// $gr3=($g3 / $gt) * 360; // none

for($i=1;$i<=4;$i++) {
	// ${"q".$i."1"}=$db->count("answer", ["question".$i=>1], "GROUP BY `systemID`");
	// ${"q".$i."2"}=$db->count("answer", ["question".$i=>2], "GROUP BY `systemID`");
	// ${"q".$i."3"}=$db->count("answer", ["question".$i=>3], "GROUP BY `systemID`");
	// ${"q".$i."4"}=$db->count("answer", ["question".$i=>4], "GROUP BY `systemID`");
	// ${"q".$i."5"}=$db->count("answer", ["question".$i=>5], "GROUP BY `systemID`");
	for($y=1;$y<=5;$y++) {
		${"q".$i.$y}=$db->count("answer", ["question".$i=>$y], "GROUP BY `systemID`");
	}
}

// $a0=$db->count("answer", ["age"=>["<=","and",20]], "GROUP BY `systemID`");
// $a1=$db->count("answer", ["age"=>["<=","and",30]], "GROUP BY `systemID`") - $a0;
// $a2=$db->count("answer", ["age"=>["<=","and",40]], "GROUP BY `systemID`") - $a1;
// $a3=$db->count("answer", ["age"=>[">=","and",40]], "GROUP BY `systemID`");
for($i=0;$i<=2;$i++) {
	${"a".$i}=$db->count("answer", ["age"=>["<=","and",$i*10+20]], "GROUP BY `systemID`");
}
$a3=$db->count("answer", ["age"=>[">=","and",40]], "GROUP BY `systemID`");
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
		</style>
	</head>
	<body>
		<div class="mdl-grid" dir="rtl">
			<div class="mdl-cell mdl-cell--3-col"></div>
			<div class="mdl-cell mdl-cell--6-col">
				<h1 class="rtl">نتایج پرسشنامه</h1>
				<div class="chart-contents mdl-card mdl-shadow--2dp" style="width: 100%; padding: 16px">
					<!-- js -->
					<canvas id="barChart0"></canvas>
					<canvas id="barChart1"></canvas>
					<canvas id="barChart2"></canvas>
					<canvas id="barChart3"></canvas>
					<canvas id="barChart4"></canvas>
					<canvas id="barChart5"></canvas>
					<canvas id="barChart6"></canvas>
				</div>
			</div>
		</div>
		<script src="https://cdn.rtlcss.com/mdl/1.2.1/material.min.js" integrity="sha384-Llr4wcq+yhgKO4ZQRN7Sx88cvQneoOOxcysisJKroD8nKQA7y0NyriabEaMYsvWW" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
		<script type="text/javascript">
		let charts=[
			{
				question: "جنسیت شرکت کنندگان",
				labels: ["جنسیت مذکر", "جنسیت مونث", "جنسیت ذکر نشده"],
				data: [<?= $gm ?>, <?= $gf ?>, <?= $gn ?>],
				backgroundColor: ["orange", "red", "yellow"],
				position: "right",
			},
			{
				question: "محدوده سنی شرکت کنندگان",
				labels: ["زیر ۲۰ سال", "از ۲۰ تا ۳۰ سال", "از ۳۰ تا ۴۰ سال", "بیش از ۴۰ سال"],
				data: [<?= $a0 ?>, <?= $a1 ?>, <?= $a2 ?>, <?= $a3 ?>],
				backgroundColor: ["orange", "red", "yellow", "blue"],
				position: "left",
			},
			{
				question: "خودم رو فرد کتابخوانی میدونم.",
				labels: ["خیلی زیاد", "زیاد", "متوسط", "کم", "خیلی کم"],
				data: [<?= $q11 ?>, <?= $q12 ?>, <?= $q13 ?>, <?= $q14 ?>, <?= $q15 ?>],
				backgroundColor: ["orange", "red", "yellow", "green", "blue"],
				position: "right",
			},
			{
				question: "خودم رو فرد ورزشکاری میدونم.",
				labels: ["خیلی زیاد", "زیاد", "متوسط", "کم", "خیلی کم"],
				data: [<?= $q21 ?>, <?= $q22 ?>, <?= $q23 ?>, <?= $q24 ?>, <?= $q25 ?>],
				backgroundColor: ["orange", "red", "yellow", "green", "blue"],
				position: "left",
			},
			{
				question: "خودم رو فرد صادقی میدونم.",
				labels: ["خیلی زیاد", "زیاد", "متوسط", "کم", "خیلی کم"],
				data: [<?= $q31 ?>, <?= $q32 ?>, <?= $q33 ?>, <?= $q34 ?>, <?= $q35 ?>],
				backgroundColor: ["orange", "red", "yellow", "green", "blue"],
				position: "right",
			},
			{
				question: "خودم رو فرد خلاقی میدونم.",
				labels: ["خیلی زیاد", "زیاد", "متوسط", "کم", "خیلی کم"],
				data: [<?= $q41 ?>, <?= $q42 ?>, <?= $q43 ?>, <?= $q44 ?>, <?= $q45 ?>],
				backgroundColor: ["orange", "red", "yellow", "green", "blue"],
				position: "left",
			},
		];
		let content=document.querySelector(".chart-contents");
		Chart.defaults.global.defaultFontColor = "black";
		Chart.defaults.global.defaultFontSize = 16;
		Chart.defaults.global.defaultFontFamily = "\"Vazir\"";
		for(let i=0;i<charts.length;i++) {
			var canvas = document.getElementById("barChart"+i);
			var ctx = canvas.getContext("2d");
			var data = {
				labels: charts[i].labels,
				datasets: [ {
					fill: true,
					backgroundColor: charts[i].backgroundColor,
					data: charts[i].data,
					// borderColor:	["black", "black"],
					// borderWidth: [2,2]
				}]
			};
			var options = {
				title: {
					display: true,
					text: charts[i].question,
					position: charts[i].position
				},
				rotation: -0.7 * Math.PI
			};
			var myBarChart = new Chart(ctx, {
				type: "pie",
				data: data,
				options: options
			});
		}
		</script>
	</body>
</html>