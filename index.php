<?php 
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Translator</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<body>
		<div class="container">
			<div class="row mt-4">
				<p class="text-center text-white bg-info mt-2 mb-4 mt-2 pt-3 pb-3">Translator Using Google Cloud</p>
				<div class="col-md-6 float-left">
					<div class="form-group">
						<label>Provide Language</label>
						<select class="form-select" id="source">

							<option value="en" selected>English</option>
						</select>
					</div>
				</div>
				<div class="col-md-6 float-left">
					<div class="form-group">
						<label>Translate Language</label>
						<select class="form-select" id="target">
							<option value="">Select Your Language</option>
							<option value="bn">Bangla</option>
							<option value="he">Hindi</option>
							<option value="ar-dz">Arabic</option>
							<option value="zh-hk">Chinese</option>
							<option value="ur">Urdu</option>
							<option value="ja">Japanese</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Input English Language</label>
					<textarea class="form-control" id="inputData" rows="3" placeholder="Please provide your input as english"></textarea>
				</div>
			</div>
			<input type="button" onclick="translateData()" class="btn btn-info mt-3" value="Translate">
			<div class="col-md-12">
				<p class="text-center text-white bg-info pt-3 pb-3 mt-2 mb-2">Translated History</p>
				<table class="table table-hover table-border" id="translatedRecord">
					<thead>
						<tr>
							<th>SL</th>
							<th>Provide Language</th>
							<th>Translated Language</th>
							<th>Input</th>
							<th>Output</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sl=1;
						$translateData=mysqli_query($conn, "SELECT * FROM `translator`");
						while ($translateRow=mysqli_fetch_assoc($translateData)) 
						{
							?>
							<tr>
								<td><?php echo $sl; ?></td>
								<td><?php echo $translateRow['selected_language']; ?></td>
								<td><?php echo $translateRow['transfarm_language']; ?></td>
								<td><?php echo $translateRow['input_language']; ?></td>
								<td><?php echo $translateRow['output_language']; ?></td>
							</tr>
							<?php
							$sl++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<?php
		// require_once ('vendor/autoload.php');
		// use \Statickidz\GoogleTranslate;

		// $source = 'bn';
		// $target = 'ar-dz';
		// $text = 'আমার সোনার বাংলা';

		// $trans = new GoogleTranslate();
		// $result = $trans->translate($source, $target, $text);
		// echo $result;
		?>
		<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
	</body>
	</html>
	<script type="text/javascript">

		function translateData()
		{
			var target=$("#target").val();
			var source=$("#source").val();
			var inputData=$("#inputData").val();
			$.ajax({
				url: "translate.php",
				type: "POST",
				data: {
					target: target,
					source: source,
					inputData: inputData
				},
				success: function (response) {
					alert(response);
					$("#translatedRecord").load(" #translatedRecord > *");
					$("#target").val('');
					$("#source").val('');
					$("#inputData").val('');
				}
			});
		}
	</script>