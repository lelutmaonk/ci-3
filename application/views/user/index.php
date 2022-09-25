                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4 mb-4"><?php echo $title?></h2>
                        
                        <!-- Content -->
                        <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/profile/' . $user['image'])?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $user['name']?></h5>
                                <p class="card-text"><?php echo $user['email']?></p>
                                <p class="card-text"><small class="text-muted">Member since <?php echo date('d F Y', $user['date_created'])?></small></p>
                            </div>
                            </div>
                        </div>
                        </div>
                        
                     
                    </div>
                </main>
                
