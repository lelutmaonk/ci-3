<main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4 mb-4"><?php echo $title?></h2>

                        <!-- Content -->
                       
                        <div class="row">
                            <div class="col-md-10">
                                
                            <a href="" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add New Menu
                            </a>

                            <!-- From Validation Error -->
                            <?php if(validation_errors()) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo validation_errors();?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif;?>
                            
                            <!-- Flashdata insert success -->
                            <?php echo $this->session->flashdata('message')?>

                            <table class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">is_active</th>
                                <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($submenu as $m) : ?>
                                <tr>
                                <th scope="row"><?php echo $no++?></th>
                                <td><?php echo $m['title']?></td>
                                <td><?php echo $m['menu']?></td>
                                <td><?php echo $m['url']?></td>
                                <td><?php echo $m['icon']?></td>
                                <td><?php echo $m['is_active']?></td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add New Sub Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php base_url('menu/submenu')?>" method="POST">
                        <div class="modal-body">
                            
                            <div class="form-floating mb-3 mt-2">
                            <input type="text" class="form-control" name="title">
                            <label for="floatingInput">Title</label>
                            </div>

                            <div class="form-floating mb-3 mt-2">
                            <select class="form-select form-select-sm" name="menu_id">
                                <option value="">Select Menu</option>
                                <?php foreach($menu as $mn) :?>
                                    <option value="<?php echo $mn['id']?>"><?php echo $mn['menu']?></option>
                                <?php endforeach;?>
                            </select>
                            <label for="floatingInput">Menu</label>
                            </div>

                            <div class="form-floating mb-3 mt-2">
                            <input type="text" class="form-control" name="url">
                            <label for="floatingInput">Url</label>
                            </div>

                            <div class="form-floating mb-3 mt-2">
                            <input type="text" class="form-control" name="icon">
                            <label for="floatingInput">Icon</label>
                            </div>

                            <div class="input-group mb-3">
                            <input type="text" class="form-control" value="is active ?" disabled>
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="1" name="is_active" checked>
                            </div>
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