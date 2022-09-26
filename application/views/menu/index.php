<main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4 mb-4"><?php echo $title?></h2>

                        <!-- Content -->
                       
                        <div class="row">
                            <div class="col-md-8">
                                
                            <a href="" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add New Menu
                            </a>

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
                                <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($menu as $m) : ?>
                                <tr>
                                <th scope="row"><?php echo $no++?></th>
                                <td class="text-center"><?php echo $m['menu']?></td>
                                <td class="text-center">
                                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                     
                    </div>
                </main>
                

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php base_url('menu')?>" method="POST">
                        <div class="modal-body">
                            <div class="form-floating mb-3 mt-2">
                            <input type="text" class="form-control" name="menu" value="<?php echo set_value('')?>">
                            <label for="floatingInput">Menu Name</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>