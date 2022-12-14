<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="col-md-10 col-md-offset-1">
 <div class="row">
	 <div class="box box-warning radius">
  <div class="box-header with-border ">
  <div class="row">
  	<section class="content-header">
     <h1>
        &nbsp;
      </h1>
      <p>
        <?php echo $this->session->flashdata('pesan'); ?>
      </p>
      <ol class="breadcrumb">
        <li class="white"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
         <li><a href="<?php echo base_url('epelayanan'); ?>">Epelayanan</a></li>
        <li class="active white"><?php echo $crumb ?></li>
      </ol>
 	</section>
  </div>
  </div>
  <div class="box-body">
    <div class="col-md-12">
      <div class="row">
            <h3 class="text-center"><b><?php echo $crumb; ?></b></h3>
            <br>
      <form action="<?php base_url('epelayanan/kpj') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
       <?php 
        if (empty($edit)) {
            echo "<div class='alert alert-danger alert-dismissible animated fadein' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-icon'></i>Maaf, Data yang anda cari Belum Ada  !</div>
        ";  
        redirect('epelayanan/histori','refresh');
          } else {
            foreach ($edit as $value) {
             $d_surat   = json_decode($value->isi_surat);  
             $d_berkas  = json_decode($value->berkas_syarat);  
           ?>
      <br>
 
          <div class="col-sm-12 form-horizontal">
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Nama Lengkap <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $d_surat->nama_lengkap ?>"  placeholder="Nama Lengkap">
              <?php echo form_error('nama_lengkap','<small class="text-red">','</small>'); ?>
            </div>  
          </div>  
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">NIK <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" name="nik" value="<?php echo $value->nik ?>" class="form-control"  placeholder="NIK Pemohon">
                     <?php echo form_error('nik','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Tempat, Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-md-5">
            <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo $d_surat->tmp_lahir ?>">
            <?php echo form_error('tmp_lahir','<small class="text-red">','</small>'); ?>
          </div>
          <div class="col-md-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?php echo $d_surat->tgl_lahir ?>" placeholder="Ex : 04/20/1996">
              </div>
            <?php echo form_error('tgl_lahir','<small class="text-red">','</small>'); ?>
          </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="jns_kelamin" value="Laki-laki" <?php if ($d_surat->jns_kelamin == 'Laki-laki') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('jns_kelamin','Laki-laki');?>  class="minimal form-control">&nbsp;&nbsp;  Laki-laki&nbsp;&nbsp;
              <input type="radio" name="jns_kelamin" value="Perempuan" <?php if ($d_surat->jns_kelamin == 'Perempuan') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('jns_kelamin','Perempuan');?> class="minimal form-control">&nbsp;&nbsp;  Perempuan <br>
                <?php echo form_error('jns_kelamin','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Kewarganegaraan</label>
            <div class="col-sm-10">
              <input type="radio" name="kewarganegaraan" value="WNI" <?php if ($d_surat->kewarganegaraan == 'WNI') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('kewarganegaraan','WNI');?>  class="minimal form-control">&nbsp;&nbsp;  WNI&nbsp;&nbsp;
              <input type="radio" name="kewarganegaraan" value="WNA" <?php if ($d_surat->kewarganegaraan == 'WNA') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('kewarganegaraan','WNA');?> class="minimal form-control">&nbsp;&nbsp;  WNA <br>
                <?php echo form_error('kewarganegaraan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Status Perkawinan <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="radio" name="status_perkawinan" value="Belum Kawin" <?php if ($d_surat->status_perkawinan == 'Belum Kawin') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('status_perkawinan','Belum Kawin');?>  class="minimal form-control">&nbsp;&nbsp;  Belum Kawin&nbsp;&nbsp;
              
              <input type="radio" name="status_perkawinan" value="Kawin" <?php if ($d_surat->status_perkawinan == 'Kawin') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('status_perkawinan','Kawin');?> class="minimal form-control">&nbsp;&nbsp;  Kawin&nbsp;&nbsp;

               <input type="radio" name="status_perkawinan" value="Cerai Hidup" <?php if ($d_surat->status_perkawinan == 'Cerai Hidup') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('status_perkawinan','Cerai Hidup');?>  class="minimal form-control">&nbsp;&nbsp;  Cerai Hidup&nbsp;&nbsp;
                <input type="radio" name="status_perkawinan" value="Cerai Mati" <?php if ($d_surat->status_perkawinan == 'Cerai Mati') { echo "checked";} else {  echo "";  } ?> <?php echo set_radio('status_perkawinan','Cerai Mati');?>  class="minimal form-control">&nbsp;&nbsp;  Cerai Mati&nbsp;&nbsp; <br>
                <?php echo form_error('status_perkawinan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Agama <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <select name="agama" class="form-control">
                     <option <?php echo set_select('agama', $d_surat->agama,TRUE); ?> value="<?php echo $d_surat->agama ; ?>"><?php echo $d_surat->agama ; ?></option>
                      <?php foreach ($agama as $key => $value) { ?>
                           <option class="kapital" <?php echo set_select('agama', $value->agama); ?> value="<?php echo $value->agama ?>"><?php echo $value->agama ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('agama','<small class="text-red">','</small>'); ?>
                  </div>
                </div>
        
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat"  placeholder="Contoh : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo $d_surat->alamat ?></textarea>
              <?php echo form_error('alamat','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Pekerjaan</label>
            <div class="col-sm-10">
              <input type="text" name="pekerjaan" class="form-control" value="<?php echo $d_surat->pekerjaan ?>" placeholder="Pekerjaan">
              <?php echo form_error('pekerjaan','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Status Hubungan dalam Keluarga </label>
            <div class="col-sm-10">
              <input type="text" name="shdk" class="form-control" value="<?php echo $d_surat->shdk ?>" placeholder="Ex : Ayah">
              <?php echo form_error('shdk','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10 ">
            <hr>
           Keterangan Pindah :
              <hr>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alasan Pindah <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alasan_pindah"  placeholder="Alasan Pindah" class="form-control"><?php echo $d_surat->alasan_pindah ?></textarea>
              <?php echo form_error('alasan_pindah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>
            <div class="col-sm-10 ">
            <hr>
           Tujuan Pindah :
              <hr>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label font-title">Alamat Pindah <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <textarea name="alamat_pindah"  placeholder="Alamat Pindah" class="form-control"><?php echo $d_surat->alamat_pindah ?></textarea>
              <?php echo form_error('alamat_pindah','<small class="text-red">','</small>'); ?>
            </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Desa/Kelurahan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="desa_kelurahan" value="<?php echo $d_surat->desa_kelurahan ?>" class="form-control"  placeholder="Desa/Kelurahan">
                     <?php echo form_error('desa_kelurahan','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Kecamatan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="kecamatan" value="<?php echo $d_surat->kecamatan ?>" class="form-control"  placeholder="Kecamatan">
                     <?php echo form_error('kecamatan','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Kab/Kota <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="kabupaten" value="<?php echo $d_surat->kabupaten ?>" class="form-control"  placeholder="Kab/Kota">
                     <?php echo form_error('kabupaten','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Provinsi <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="provinsi" value="<?php echo $d_surat->provinsi ?>" class="form-control"  placeholder="Provinsi">
                     <?php echo form_error('provinsi','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Klasifikasi Pindah <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="klasifikasi_pindah" value="<?php echo $d_surat->klasifikasi_pindah ?>" class="form-control"  placeholder="Klasifikasi Pindah">
                     <?php echo form_error('klasifikasi_pindah','<small class="text-red">','</small>'); ?>
                  </div>
        </div>
        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Jenis Kepindahan <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="jns_kepindahan" value="<?php echo $d_surat->jns_kepindahan ?>" class="form-control"  placeholder="Jenis Kepindahan">
                     <?php echo form_error('jns_kepindahan','<small class="text-red">','</small>'); ?>
                  </div>
        </div>

        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Status KK bagi yang tidak pindah <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="status_kk_tdk_pindah" value="<?php echo $d_surat->status_kk_tdk_pindah ?>" class="form-control"  placeholder="Status KK bagi yang tidak pindah">
                     <?php echo form_error('status_kk_tdk_pindah','<small class="text-red">','</small>'); ?>
                  </div>
        </div>

        <div class="form-group">
                  <label  class="col-sm-2 control-label font-title">Status KK bagi yang pindah <span class="text-red">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="status_kk_pindah" value="<?php echo $d_surat->status_kk_pindah ?>" class="form-control" placeholder="Status KK bagi yang pindah">
                     <?php echo form_error('status_kk_pindah','<small class="text-red">','</small>'); ?>
                  </div>
        </div>

  </div>
  
  
  <div class="col-sm-12">
      <table class="table bg-warning table-bordered font-title">
      <h4 class="text-orange">Persyaratan Pembuatan <?php echo $syarat ?> :</h4>
        <thead >
          <tr >
            <th class="text-center">#</th>
            <th>Persyaratan</th>
            <th class="text-center">Upload File</th>
          </tr>
        </thead>
        <tbody >
          <tr>
            <td class="text-center">1</td>
            <td>Fotocopy KTP</td>
            <td>
              <input name="kpw_1" type="file" class="form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Pas Photo Berwarna 4x6</td>
            <td>
              <input type="file" name="kpw_2" class= "form-control" />
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>Surat Keterangan Pindah Jiwa dari daerah Asal</td>
            <td class="text-center">
              <input type="file" name="kpw_3" class="form-control" />
            </td>
          </tr>
        
           <tr>
            <td colspan="3">
            <span><i class="fa text-danger fa-info-circle"></i> File harus berformat pdf atau jpg maximal 1 <b>Mb</b></span>
            </td>
          </tr>
        </tbody>  
      </table>
  </div>
  
  </div><!--  akhir row -->
    </div>
      </div>

  <div class="box-footer with-border">
        <div class="col-md-4 col-xs-5">
          <a href="<?php echo base_url('epelayanan'); ?>" class="btn btn-app bg-orange pull-right">
            <i class="ion ion-reply"></i> Kembali
          </a>
        </div>
        <div class="col-md-6 col-xs-6">
          <button type="submit" class="btn btn-app bg-orange pull-right">
            <i class="fa fa-save"></i> Ajukan Permohonan
          </button>
        </div>
      </div>
  </form>    
  <div class="box-footer radius">
    <div class="pull-left">
    <small><strong class="text-red">*</strong>  Field wajib diisi !</small> <br>
    <small><strong class="text-blue">*</strong> Field Optional !</small>
    </div>
  </div>
</div>
<?php }} ?>
</div>
</div>
</div>
