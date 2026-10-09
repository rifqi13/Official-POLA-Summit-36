<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center p-5">
                        
                        <!-- ============================================ -->
                        <!-- ALERT SUKSES (TANPA SWEETALERT) -->
                        <!-- ============================================ -->
                        <?php if (isset($success_message)): ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle fa-3x d-block mb-3 text-success"></i>
                                <h4 class="alert-heading">Registration Successful!</h4>
                                <p><?= $success_message ?></p>
                                
                                <?php if (!empty($last_insert_id)): ?>
                                    <p class="mt-2">
                                        <span class="badge bg-primary">
                                            Registration ID: #<?= str_pad($last_insert_id, 6, '0', STR_PAD_LEFT) ?>
                                        </span>
                                    </p>
                                <?php endif; ?>
                                
                                <?php if (!empty($fullname)): ?>
                                    <p class="text-muted small">
                                        <i class="fas fa-user me-1"></i> 
                                        Welcome, <strong><?= $fullname ?></strong>!
                                    </p>
                                <?php endif; ?>
                                
                                <hr>
                                <p class="text-muted small">
                                    <i class="fas fa-envelope me-1"></i> 
                                    You will receive a confirmation email shortly.
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                No success message found.
                            </div>
                        <?php endif; ?>
                        
                        <!-- ============================================ -->
                        <!-- TOMBOL (TANPA SWEETALERT) -->
                        <!-- ============================================ -->
                        <div class="mt-4 d-flex gap-2 justify-content-center flex-wrap">
                            <a href="<?= base_url('registration/insert_more') ?>" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i> Insert More
                            </a>
                            <a href="<?= base_url('registration/done') ?>" class="btn btn-success">
                                <i class="fas fa-home me-2"></i> Done
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>