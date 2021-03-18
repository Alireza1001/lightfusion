<!-- lf_page_edit -->
<h2 class="hndle ui-sortable-handle">Media integration</h2>
<form action="" method="post/get" name="lf_media_dir" >
	<div style="
		display: grid;
		grid-auto-flow: row;
		background-color: #fff;
		padding: 6% 8%;
		box-sizing: border-box;
		border: 1px solid #d3d3d3;" >
	<label>video directory</label>
	<input type="text" name="lf_page_media_video" id="lf_page_media_video" class="media_inputs_to_upload" style="
		border: 1px solid #0004;
		padding: 2%;
		border-radius: 1px;
		width: 83%;	"/>
	<label>audio directory</label>
	<input type="text" name="lf_page_media_audio" id="lf_page_media_audio" class="media_inputs_to_upload" style="
		border: 1px solid #0004;
		padding: 2%;
		border-radius: 1px;
		width: 83%;"/>
	<input type="submit" name="lf_media_submit" id="lf_media_submit" style="width: 100%;margin-top: 15px;" class="button button-large button-primary"/>
	</div>
</form>

<?php
	$theme_dir = get_template_directory_uri();
	$id = get_the_ID();

	$servername = "localhost";
	$username = "pilotsco_caspian_user";
	$password = "k(pMXJHOuHt^";
	$DBName = "pilotsco_caspian_theme";
	$conn = new mysqli($servername, $username, $password, $DBName);
	$conn -> set_charset("utf8");
	if($conn->connect_error) 
		die("connection failed: ".$conn->connect_error);

	$sql = "SELECT Video, Audio, page_req FROM meida WHERE page_req=$id";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			$Video = $row["Video"];
			$Audio = $row["Audio"];
		}
	} else {
		echo "0 results";
	}
	$conn->close();
?>
<script type="text/javascript">
	var video = "<?php echo $Video; ?>";
	var audio = "<?php echo $Audio; ?>";
	document.querySelectorAll('.media_inputs_to_upload')[0].value = video;
	document.querySelectorAll('.media_inputs_to_upload')[1].value = audio;
	var theme_dir = "<?php echo $theme_dir; ?>";
	var theme_media_dir = theme_dir+"-media";
	const url = theme_media_dir+'/process.php?page_req='+post_id+'&video='+(files[0].value)+'&audio='+(files[1].value)+'';
	var post_id = "<?php echo $id; ?>";
	document.getElementById("lf_media_submit").addEventListener("click", e=>{
		e.preventDefault();
		const files = document.querySelectorAll('.media_inputs_to_upload');
		const formData = new FormData();
		// for (let i=0; i<2; i++) {
	   	// 	formData.append('files[]', files[i].value);
		// }
		// fetch(url, {
		//     method: 'POST',
		//     body: formData,
		//   }).then((response) => {
		//     console.log(response);
		// })
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", url, true);
        xhttp.send();
		// alert(xhttp.response);
		
		});
</script>
