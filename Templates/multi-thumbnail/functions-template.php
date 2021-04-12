<?php
function multithumbmail_html( $post ) { 
    $value = get_post_meta( $post->ID, '_multithumbmail', true ); 
	?>

		<style>
			#secondthumbnail_cover {
				background-color: #2323239e;
				width: 90.9vw;
				height: 80vh;
				padding: 10vh 4vw;
				left: 0;
				z-index: 14000;
				position: fixed;
				top: 0;
				display: none;
			}
			#secondthumbnail_cover.active {
				display: block;
			}
			#secondthumbnail_list li {
				width: 13.66vw;
			}
			#secondthumbnail_list li.active img {
				border-color: #1976d2;
			}
			#secondthumbnail_list li img {
				width: 100%;
				max-height: 15vh;
				border: 5px solid #0000;
				border-radius: 1px;
			}
			#secondthumbnail_list {
				display: flex;
				flex-flow: wrap;
				column-gap: 9px;
				overflow-y: scroll;
				background-color: #fff;
				padding: 30px;
				height: 56vh;
				position: relative;
				margin: 0px;
			}
			body.active {
				overflow: hidden;
			}
			#secondthumbnail_head p {
				font-size: 1rem;
				margin: 14px 0;
				font-weight: 600;
			}
			#secondthumbnail_head {
				background-color: #eaeaea;
				display: grid;
				grid-template-columns: auto min-content;
				padding: 0 2%;
			}
			#secondthumbnail_submit, #displayattachmentslist {
				background-color: #1976d2;
				width: fit-content;
				padding: 9px;
				font-weight: 600;
				color: #fff;
				border-radius: 3px;
				margin-left: auto;
				margin-right: 4%;
			}
			#secondthumbnail_bottom {
				display: grid;
				background-color: #eaeaea;
			}
			#displayattachmentslist {
				margin-left: 0;
			}
			#displayattachment_preview {
				width: 50%;
			}
		</style>


		

	<section id="secondthumbnail_cover">
		<div id="secondthumbnail_head">
			<p>2nd Feature img</p>
			<p><svg id="close_secondthumbnail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/></svg></p>
		</div>
		<ul id="secondthumbnail_list">
		<?php

			$args = array('post_type'=>'attachment' , 'post_mime_type'=>'image' , 'posts_per_page'=>-1);
			$theattachmentslistarr = [];
			$theattachmentslistcount = 0;
			$theattachmentslistdom = '';
			foreach( get_posts( $args ) as $image) {
				$imgmainsrc = wp_get_attachment_url( $image->ID );
				$imgmainsrc2 = '"'.$imgmainsrc.'"';
				$baseimgsrc = substr($imgmainsrc, 0, strripos($imgmainsrc, '.'));
				$exeimgsrc = substr($imgmainsrc, strripos($imgmainsrc, '.'));
				$generalimgexe = $exeimgsrc;
				$newimgsrcset = $baseimgsrc.$exeimgsrc;
				$newimgsrcset1 = $baseimgsrc."-small".$generalimgexe;
				$theattachmentslistdom .= '<li class="thumbnaillistimg thumbnaillistid_'.$image->ID.'" onclick="thumbnailimgclick('.$image->ID.')" data-id="'.$image->ID.'" data-url="'.$imgmainsrc.'"><img src="'.$newimgsrcset1.'"></li>';
				$theattachmentslistarr[$image->ID] = wp_get_attachment_url( $image->ID );
				$theattachmentslistcount+=1;
			}

		?>
		</ul>
		<div id="secondthumbnail_bottom">
			<p id="secondthumbnail_submit">Submit the image</p>
		</div>
	</section>
	<p id="displayattachmentslist">Set feature image</p>
	<img src="<?php echo wp_get_attachment_url( $value ) ?>" id="displayattachment_preview">
	<input name="multithumbmail_n" id="multithumbmail_n" value="<?php echo $value; ?>" />
	

	<script>

		var thumbnaillistjson = <?php echo json_encode($theattachmentslistarr); ?>;
		var lastactiveid = <?php echo $value; ?>;

		function thumbnailimgclick(id) {
			lastactiveid = id;
			document.querySelectorAll("#secondthumbnail_list .thumbnaillistimg").forEach(item=>{item.classList.remove('active');});
			document.querySelector(".thumbnaillistid_"+id+"").classList.add('active');
		}

		const thedom = document.querySelector('#secondthumbnail_cover');
		document.getElementById('displayattachmentslist').addEventListener('click', ()=>{
			thedom.classList.add('active');
			document.body.classList.add('active');
			document.getElementById('secondthumbnail_list').innerHTML += thethumbnaillistdom;
			document.querySelector("#secondthumbnail_list .thumbnaillistid_"+lastactiveid+"").classList.add("active");
		});

		document.getElementById("secondthumbnail_submit").addEventListener("click", ()=>{
			document.getElementById('multithumbmail_n').value = lastactiveid;
			document.getElementById('multithumbmail_n').setAttribute("value", lastactiveid);
			document.getElementById('displayattachment_preview').setAttribute("src", thumbnaillistjson[lastactiveid]);
			thedom.classList.remove("active");
			document.body.classList.remove("active");
			document.getElementById('secondthumbnail_list').innerHTML = "";
		});

		document.getElementById("close_secondthumbnail").addEventListener("click", ()=>{
			thedom.classList.remove("active");
			document.body.classList.remove("active");
			document.getElementById('secondthumbnail_list').innerHTML = "";
		});

		var thethumbnaillistdom = '<?php echo $theattachmentslistdom; ?>';
	
	</script>
<?php }
