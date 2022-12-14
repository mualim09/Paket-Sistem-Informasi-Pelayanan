<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Nama Data : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="title" class="form-control" value="<?php echo $get->nama_data; ?>">
						<p class="help-block"><?php echo form_error('title', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Kategori : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<select name="kategori" class="form-control">
                      <?php foreach ($this->setting->kategori_download() as $key => $value) { ?>
                           <option <?php if ($get->kategori == $value->id): ?>
                           	selected
                           <?php endif ?> <?php echo set_select('kategori', $value->id); ?> value="<?php echo $value->id ?>"><?php echo $value->nama_kategori ?></option>
                      <?php } ?>
                    </select>
                    <p class="help-block"><?php echo form_error('kategori', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">File : <strong class="text-red">*</strong></label>
					<div class="col-md-8 ">
					<input type="file" required="required" name="foto" class="form-control">
					 <p class="help-block">	<i>File Harus berformat Pdf </i></p>
					</div>
				</div>

			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/download') ?>" class="btn btn-app pull-right">
						<i class="ion ion-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-6 col-xs-6">
					<button type="submit" class="btn btn-app pull-right">
						<i class="fa fa-save"></i> Simpan
					</button>
				</div>
			</div>
			<div class="box-footer with-border">
					<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
					<small><strong class="text-blue">*</strong>	Field Optional</small>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>