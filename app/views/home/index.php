<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?=PROOT?>css/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="loaderwrapper">	
		<div class="loader">
			<span> </span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="container">
		<div class="bgcont1">
			<div class="bg bg1"></div>
		</div>
		<div class="card" id="1" onmouseover="addContent(this.id)">
			<div class="face face1">
				<div class="content">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA6ElEQVRIS+WUTQ6CMBBGp3WpjZDqEqwnUG7gTcSbcRRvIDcQcKkEIrq0mBolavgZICQaWH/zXvvRDIGOP9IxH3omYMbJVpUmh4mDrRZd0VBESyrlToElpdbV012MBCXQRKTdpNwDgPaExgNK57Gnx1USlIAZoQsEFu8wAuCeA261FjAzVH2vC0BOEvBNmQR1gxeAmWH6+MkBR8+hgwrcSoAZbpLJbtBkOK/7b07PBFVvPu8h1Kro5wVqr4wxp0Rk/CTgQuWyikbiuCKSqrUwQwDKIn5KpX3xptsPQUto4XitVdHkEP8vuANzN30ZzEfXEgAAAABJRU5ErkJggg=="/>				</div>
					<h3>Upload</h3>
			</div>
			<div class="face face2">
				<div class="content">
					<p>Edit and upload images</p>
					<a href="#">Go</a>
				</div>
			</div>
		</div>
		<div class="bgcont2">
			<div class="bg bg2"></div>
		</div>
		<div class="card" id="2" onmouseover="addContent(this.id)">
				<div class="face face1">
					<div class="content">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAvUlEQVRIS2NkoDFgpLH5DPSzgEfhtQPjP6b5DAwMChT66sF/pn+JXx6IHgCZA/cBr9zbBwwMDPIUGg7T/uDzI2FFdAv+gwQ+PxKmKNh45d6imIPsA/paAHMJepDBfIgujy4O4+P0wYBbgCsxEB0HhHxAcwsGfxyQm+GIjgOaW4ArknFZTLV8QDULaB5EtLCAmsX1w8+PhMH1CrwsglY4C6hQJzz8z/QvAaPCITdICOmjqHIhZDhKEBGjmBw1AHQRvBm99s2VAAAAAElFTkSuQmCC"/ alt="feed">
						<h3>Feed</h3>
					</div>
				</div>
				<div class="face face2">
					<div class="content">
						<p>View community photos and feedback</p>
						<a href="#">Go</a>
					</div>
				</div>
		</div>
		<div class="bgcont3">
			<div class="bg bg3"></div>
		</div>
		<div class="card" id="3" onmouseover="addContent(this.id)">
				<div class="face face1">
					<div class="content">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABuElEQVRIS7WUy1XCUBCG/7m4NAoElyBWoFYgdgAVKBWoFRAqMFYgViBUIHYAFYjBnXAEwlLueG4I4ZXAReDucjIz3z9Pwp4f7Tk+QgHx7E/8V8o7AeQZuFAiCGhIoHogxFOvlejpClsCGOnOLYgeAcQjgvTA/OC2UxUdyBzAD/48dqQai5E9bJ3U1ddh9jtHTBaYrrzfzAW3naqugwQAVZaRlB+ecuZilMKjTNdioASgFxPibF25AsDUkWquk8yvUmacduoqEwLKA8e0VtkGACPdbYBwzkJeT8oS5eiVS4o31fiBY17qATJdVoauY2qNrqFpP81A02GidnPABiUy0p08iF7BaLpt09uTqLfcZKKq+5ks7LzJ/pi2ABwzYA0dsxwGmRnTfkyIrPaYqmBB6t4iUZ2ZrOFX4j1YtFGsBOKcfzrWjqhvN6/T32ZbZRJRpj4Btlo2NaYMtl0n9bK2B7MGqlxSyntm5NVujE8DmkSoCiFsVZbJ3vh+Fdcxi2EQrZkPc5y/W55FKOTfAK9nma66qDczApYgWwF0IFsDliALl3gngADCXF888zsDbDSmq87Epv/2nsEfEmjSGRfdNLwAAAAASUVORK5CYII="/ alt="search">						<h3>Search</h3>
					</div>
				</div>
				<div class="face face2">
					<div class="content">
						<p>Search for other users and friends</p>
						<a href="#">Go</a>
					</div>
				</div>
		</div>
		<div class="bgcont4">
			<div class="bg bg4"></div>
		</div>
		<div class="card" id="4" onmouseover="addContent(this.id)">
				<div class="face face1">
					<div class="content">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAB8ElEQVRIS7WVQU7bUBCGvzG4bKjgBm1PUDgByQ0q1VkXNk0iFSk5QXsDIoFk0g1mjSP1BnVOUG7QcAOqdlH6SKZ6tkmc1HEeUN7O9nvvm/ln5rfwxEue+H7cAW/Otv21myMzaB3cJygngN/4vINOzoAdE7ecztwFsXKz3wj3UTkCtqeRKyMgUdHz27idVGXkCugBW0suShCvay7eX5Z9Xwmwh1KJmEQor61EmWRaAzqgL4BrxKuXQZwAaWS2yOu/eyZu708jzd+BvFsGcQdUCO0HYZRDEhO36sWt/wWQZffn0sqlaL1YeGeA/7Z/jGgmj0pkBs3DYqTPgvCTIh9Bz4syOgH8Rv8Y1Q9zKomcmIsZJJ+VbygjM2i9cp6DtIuC05/A5kIZfpm49bz4zg9O1T4Xh3Eug7INFYC5i/J9qwD9UdrX4u0We/peEiFXJm6+LJVo1m7SNXHTTu90FYq8icrJg4q8HoQ1Qb6mhRpv7PLl4NrJOdM2vflu/Wplm/pBmIDsoUSu1jzLXIcmblsLma5/2jRvN+uQWylkvNFdmkn+j0Cw8/ED8WqLflQ6BwuQER498IZ3h3Pz22NCB8EWtPRym8bSQcsg414qV+XSIbLWebBdZ4W3Eni13JptXFcwSRSiR/9wnLqoYpOTFz0G8hcNW/EZLIRcOAAAAABJRU5ErkJggg=="/ alt="Profile">
							<h3>Profile</h3>
						</div>
				</div>
				<div class="face face2">
					<div class="content">
						<p>Edit settings and personal preferences</p>
						<a href="#">Go</a>
					</div>
				</div>
		</div>
	</div>
	</div>
	<script>
		$(window).on("load", function(){
			$(".loaderwrapper").fadeOut("slow");
		});
		function addContent(id){
			$(document).on('mouseover', '.card', function(){
				id = '.bgcont' + id;
				$(id).addClass('active').siblings().removeClass('active');
			});
		};
	</script>
</body>
</html>