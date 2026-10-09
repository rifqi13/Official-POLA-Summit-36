 <!-- Starter Section Section -->
 <section id="" class="section mb-5">

     <!-- Section Title -->

     <div class="container section-title mt-5 text-center" data-aos="fade-up">
         <span class="summit-tag">The Presidents of Law Associations in Asia</span>
         <h2>36<sup>th</sup> POLA Summit 2026</h2>
         <span class="summit-tag">Registration for Confirmation</span>
     </div>

     <div class="container mt-5" data-aos="fade-up">
        <!-- ============================================ -->
        <!-- TAMPILKAN SUCCESS DARI URL PARAMETER -->
        <!-- ============================================ -->
        <!-- ============================================ -->
        <!-- TAMPILKAN ERROR (JIKA ADA) -->
        <!-- ============================================ -->
        <?php if (isset($error) && !empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>


         <form class="form-card" action="<?php echo site_url('registration/process'); ?>" method="post">
             <div class="row d-flex mb-2 contact-info">
                 <div class="col-md-12 mb-4">
                     <h4 class="h4 text-left">Contact Details</h4>
                 </div>
             </div>

             <div class="row justify-content-between text-left">
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Title/Salutation<span class="text-danger"> *</span></label>
                     <input type="text" id="title" name="title" placeholder="" onblur="validate(1)">
                     <span style="color: #f86c61"> <?= form_error('title'); ?> </span>
                 </div>
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Full Name<span class="text-danger"> *</span></label>
                     <input type="text" id="name" name="name" placeholder="" onblur="validate(2)">
                     <span style="color: #f86c61"> <?= form_error('name'); ?> </span>
                 </div>
             </div>
             <div class="row justify-content-between text-left">
                 <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Country<span class="text-danger"> *</span></label>
                     <select type="text" id="country" name="country" placeholder="" onblur="validate(4)">
                         <option value=''>---- Select Country ----</option>
                         <?php foreach ($country as $negara): ?>
                             <option value='<?= $negara['nicename'] ?>'><?= $negara['nicename'] ?></option>
                         <?php endforeach; ?>
                     </select>
                     <span style="color: #f86c61"> <?= form_error('country'); ?> </span>
                 </div>
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Organisation<span class="text-danger"> *</span></label>
                     <input type="text" id="organisation" name="organisation" placeholder="" onblur="validate(3)">
                     <span style="color: #f86c61"> <?= form_error('organisation'); ?> </span>
                 </div>

             </div>
             <div class="row justify-content-between text-left">
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Position / Job Title<span class="text-danger"> *</span></label>
                     <input type="text" id="job" name="job" placeholder="" onblur="validate(4)">
                     <span style="color: #f86c61"> <?= form_error('job'); ?> </span>
                 </div>
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Email Address<span class="text-danger"> *</span></label>
                     <input type="email" id="email" name="email" placeholder="" onblur="validate(5)">
                     <span style="color: #f86c61"> <?= form_error('email'); ?> </span>
                 </div>
             </div>



             <div class="row d-flex mt-5 mb-3 contact-info">
                 <div class="col-md-12 mb-4">
                     <h4 class="h4 text-left">Name Badge</h4>
                     <p class="text-left">These details will be used to create your name badge. Please indicate if different from personal details above.</p>
                 </div>
             </div>

             <div class="row justify-content-between text-left">
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Preferred First Name<span class="text-danger"> *</span></label>
                     <input type="text" id="FirsName" name="FirsName" placeholder="" onblur="validate(3)">
                     <span style="color: #f86c61"> <?= form_error('FirsName'); ?> </span>
                 </div>
                 <div class="form-group col-sm-6 flex-column d-flex">
                     <label class="form-control-label px-3">Preferred Surname<span class="text-danger"> *</span></label>
                     <input type="text" id="SurName" name="SurName" placeholder="" onblur="validate(4)">
                     <span style="color: #f86c61"> <?= form_error('SurName'); ?> </span>
                 </div>
             </div>

             <div class="row d-flex mt-5 mb-1 contact-info">
                 <div class="col-md-12 mb-4">
                     <h4 class="h4 text-left">Additional Requirements </h4>
                     <p class="text-left">Please list any additional requirements (i.e. wheelchair access) and/or dietary requirements / food allergies you may have due to religious or health reasons only (i.e. Vegan, Halal, Vegetarian, Kosher, Pescatarian, any food allergy). If none, please leave blank. </p>
                 </div>
             </div>
             <div class="row justify-content-between text-left">
                 <div class="form-group col-sm-12 flex-column d-flex">
                     <label class="form-control-label px-3"> </label>
                     <textarea type="text" id="requirements" name="requirements" placeholder="" onblur="validate(3)"></textarea>
                     <span style="color: #f86c61"> <?= form_error('requirements'); ?> </span>
                 </div>
             </div>

             <div class="row d-flex mt-3 mb-3 contact-info">
                 <div class="col-md-12 mb-4">
                     <h4 class="h4 text-left">Conference Information</h4>
                     <ul class="text-left">
                         <li><b>Visas</b></li>
                         <p>A Visa to enter Indonesia is the sole responsibility of participants. Please ensure that you have a valid visa to enter Indonesia.</p>
                         <li><b>Insurance</b></li>
                         <p>Participants are advised to effect their own insurance to cover all risks including (but not limited to) costs of
                             travel, accommodation, registration, injury / death, health and medical expenses, personal property and all other risks.
                             PERADI, LAWASIA and the conference organiser are not liable for claims under any circumstances.
                             This includes participation in any pre and post activities undertaken by participants and accompanying persons.</p>
                         <li><b>Language</b></li>
                         <p>All working sessions and materials will be in English, save for any address or speech by Indonesian Government Officials.</p>
                         <li><b>Registration includes</b></li>
                         <ul>
                             <li>Access to Opening Reception</li>
                             <li>Access to all conference sessions</li>
                             <li>Conference materials, including any available speakers' papers</li>
                             <li>Tea and coffee and light refreshments during session breaks</li>
                             <li>Closing Dinner</li>
                         </ul>
                     </ul>
                     <p class="text-left">Accommodation, Flights, Visas, and social activities are not included in the registration fee.</p>

                 </div>
             </div>

             <div class="row mt-4">
                 <div class="col-12 text-center text-md-end">
                     <button type="submit" class="btn btn-primary px-5">Submit Registration</button>
                 </div>
             </div>

         </form>
     </div>

 </section><!-- /Starter Section Section -->

 <!-- ============================================ -->
<!-- SWEETALERT2 POPUP -->
<!-- ============================================ -->
<?php if (isset($show_popup) && $show_popup && isset($success)): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil data dari PHP
    var fullname = '<?= addslashes($fullname ?? "User") ?>';
    var lastId = '<?= $last_insert_id ?? "" ?>';
    var insertMoreUrl = '<?= base_url("registration/insert_more") ?>';
    var doneUrl = '<?= base_url("registration/done") ?>';
    
    // Tampilkan SweetAlert Popup
    Swal.fire({
        icon: 'success',
        title: 'Registration Successful!',
        html: `
            <div class="text-center">
                <p>Your registration has been submitted successfully.</p>
                <hr>
                <p class="text-muted small text-center">What would you like to do next?</p>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-plus-circle me-2"></i>Insert More',
        cancelButtonText: '<i class="fas fa-home me-2"></i>Done',
        confirmButtonColor: '#667eea',
        cancelButtonColor: '#00b894',
        reverseButtons: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        width: 500,
        padding: '2em'
    }).then((result) => {
        if (result.isConfirmed) {
            // Insert More - Redirect ke form registrasi
            window.location.href = insertMoreUrl;
        } else {
            // Done - Redirect ke halaman utama
            window.location.href = doneUrl;
        }
    });
});
</script>
<?php endif; ?>