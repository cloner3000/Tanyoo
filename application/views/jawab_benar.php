		<div data-role="content"> 
			<p class="text"><i>-----------soal----------</i></p> 
			
				<ul data-role="listview" data-inset="true" data-theme="d" id="tampil-text"> <!---menampilkan pertanyaan-->
					<li>
						<?php echo $soal->text_soal?>
						<p style="margin-top:5px">by <?php echo $soal->username; ?></p>	
						<p>#<?php echo $soal->tag ?></p>	
					</li>				
					
				</ul>
				<ul data-role="listview" data-inset="true" data-theme="b" id="tampil-text"  >
					<li>
					<h2><?php echo $soal->jawaban ?></h2>
					<p style="color:#3ADF00; font-size:25px"><b>benar</b></h4>
					<p style="color:#ffffff">Jawaban benar : <?php echo $soal->jawaban ?></p>
					</li>
				</ul>
				<!-- Disini buat menu-menu, edited by giri -->
				<div class="ui-grid-d">
					
					<div class="ui-block-a" style="height:50px; width:10%"></div>
					<div class="ui-block-b" style="height:50px; width:15%">
						<a href="<?php echo base_url()?>index.php/celengan/tambah_isi/<?php echo $soal->id_soal;?>"><img src="<?php echo base_url()?>css/images/t_celengan.png" width="32px"></a>
					</div>
					<?php

					if ($flagged) {
						?>
						<div class="ui-block-c" style="height:50px; width:15%">
						<a href="<?php echo base_url()?>index.php/soal/unflag_soal/<?php echo $soal->id_soal?>" data-ajax="false"><img src="<?php echo base_url()?>css/images/flag.png" width="30px"></a>
						</div>
					<?php
					}else{
						?>
						<div class="ui-block-c" style="height:50px; width:15%">
						<a href="<?php echo base_url()?>index.php/soal/flag_soal/<?php echo $soal->id_soal?>" data-ajax="false"><img src="<?php echo base_url()?>css/images/unflag.png" width="30px"></a>
						</div>
					<?php
					}
			
					?>
					
					<!--menampilkan jumlah flag-->
					<div class="ui-block-d" style="height:40px; width:20%;"><p style="margin-top:-15px; margin-left:20px; font-size:23px"> <div id="flag"><b><?php echo $num_flag?></b></p></div></div>

					<!--menampilkan penjawab-->
					<div class="ui-block-e" style="height:40px; width:20%;"> <img src="<?php echo base_url()?>css/images/orang.png" width="17px" height="27px" style="margin-top:5px;"> <div id="flag"><p style="margin-top:-28px; font-size:16px"><b><? echo $num_penjawab?></b></p></div></div>
				</div>

			
				<a href="<?php echo base_url()?>index.php/jawab" data-role="button" data-ajax="false">acak</a>

		</div> 

		<div id="user-info"></div>
		
	
