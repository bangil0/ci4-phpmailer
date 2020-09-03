<?php
    if(!empty(session()->getFlashdata('success'))){ ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('success');?>
    </div>     
    <?php } 

    if(!empty(session()->getFlashdata('error'))){ ?>
    <div class="alert alert-danger">
        <?php echo session()->getFlashdata('error');?>
    </div>
<?php } 

echo form_open('contact/send'); ?>

    <div class="form-group">
        <?php 
        form_label('To'); 
        $to = [
            'type'  => 'email',
            'name'  => 'to',
            'class' => 'form-control',
            'placeholder' => 'Enter Email Penerima'
         ];
         echo form_input($to); 
         ?>
    </div>
    <div class="form-group">
        <?php 
        form_label('Subject'); 
        $subject = [
            'type'  => 'text',
            'name'  => 'subject',
            'class' => 'form-control',
            'placeholder' => 'Enter Judul Email'
         ];
         echo form_input($subject); 
         ?>
    </div>
    <div class="form-group">
        <?php 
        form_label('Message'); 
        $message = [
            'type'  => 'text',
            'name'  => 'message',
            'rows'  => 4,
            'class' => 'form-control',
            'placeholder' => 'Enter Isi Pesan'
         ];
         echo form_textarea($message); 
         ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success col-sm-5"><i class="fa fa-send"></i>&nbsp;KIRIM EMAIL</button>
    </div>
</form>
