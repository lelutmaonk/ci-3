<main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"><?php echo $title?></h2>

                        <!-- Content -->

                        <h5 class="mb-4"><?php echo $role['role']?></h5>
                       
                        <div class="row">
                            <div class="col-md-8">
                                
                            <!-- From Validation Error -->
                            <?php echo form_error('menu',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')?>
                            
                            <!-- Flashdata insert success -->
                            <?php echo $this->session->flashdata('message')?>

                            <table class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Menu</th>
                                <th scope="col" class="text-center">Access</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($menu as $m) : ?>
                                <tr>
                                <th scope="row"><?php echo $no++?></th>
                                <td class="text-center"><?php echo $m['menu']?></td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php echo check_access($role['id'], $m['id']);?>
                                        data-role="<?php echo $role['id']?>" data-menu="<?php echo $m['id']?>">
                                    </div>
                                </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                     
                    </div>
                </main>
 