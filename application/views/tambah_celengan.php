
	<div data-role="content" id="celengan"> 
		<p class="text">-------<i>celengan soal</i>------</p>
		<p class="text"><?php echo $profil->username; ?></p> <!--- tampilkan nama user -->
		<img src="<?php echo base_url()?>css/images/celengan.png" width="70px" height="60px">

		<div data-role="fieldcontain" class="ui-hide-label">
			
			
			<?php echo form_open('celengan/add'); ?>
			<div class="ui-body ui-body-d">
				<div data-role="fieldcontain">
					<input type="text" placeholder="Nama Celengan" name="nama_celengan" class="required" title="nama celengan harus diisi">
					<input type="Submit" value="Tambah celengan" data-inline="true" data-theme="e" data-ajax="false"/>
				</div>
			</div>
		</div>
	</div>
	<div id="user-info"></div>

