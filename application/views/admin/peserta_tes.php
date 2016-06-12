<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
				<a title="Kembali" data-original-title="Kembali" class="btn btn-default" href="javascript:history.go(-1);"><i class="fa fa-chevron-left"></i></a>
					<span class="caption-subject bold uppercase"><?php echo explode(' ', $judul)[0]; ?></span>
					<span class="caption-helper uppercase"><?php echo explode(' ', $judul)[1]; ?></span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<p><strong>Detil Tes</strong></p>
				<table>
					<?php foreach ($jadwal as $key => $value) {
						if($key != "ID") {
							if($key == "TANGGAL") $value = date("d M Y", strtotime($value));
							echo "<tr>
								<td style='font-weight: bold;' width='100px'>".ucwords(strtolower($key))."</td>
								<td>:</td>
								<td>".$value."</td>
							</tr>";
						}
					} ?>
				</table><hr>
				<form action="<?= base_url(); ?>jadwal/participant_patch" method="post">
				<input type="hidden" name="jadwal" id="jadwal" value="<?= $jadwal->ID; ?>">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								No. Pendaftaran
							</th>
							<th>
								Nama
							</th>
							<th>
								Jenis Kelamin
							</th>
							<th>
								Alamat
							</th>
							<th>
								No. Telp/HP
							</th>
							<th class="table-checkbox" style="text-align: center;">
								<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($peserta as $p) {
							$jk = $p->JENIS_KELAMIN=="L"?"Laki-laki":"Perempuan";
							echo "<tr class='odd gradeX'>
								<td style='width: 10%;' class='no_pendaftaran'>".$p->NO_PENDAFTARAN."</td>
								<td style='width: 25%;'>".$p->NAMA."</td>
								<td style='width: 10%;'>".$jk."</td>
								<td style='width: 30%;'>".$p->ALAMAT_TETAP."</td>
								<td style='width: 20%;'>".$p->NO_HANDPHONE."</td>
								<td style='width: 5%;text-align: center;'>
									<input type='checkbox' name='pendaftar[]' class='checkboxes' value='".$p->NO_PENDAFTARAN."' ".$p->SELECTED." />
								</td>
							</tr>
							";
							$no++;
						} ?>
					</tbody>
				</table>

				<div class="row">
					<div class="col-md-6 col-xs-6">
						<button type="button" id="btnKembali" class="btn btn-md red" onclick="javascript:history.go(-1);"><i class="fa fa-chevron-left"></i> Kembali</button>
					</div>
					<div class="col-md-6 col-xs-6">
						<button type="submit" id="btnSimpan" class="btn btn-md green pull-right"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>