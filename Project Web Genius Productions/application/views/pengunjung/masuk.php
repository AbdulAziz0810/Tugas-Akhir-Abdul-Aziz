<div class=" header">

        <!-- Outer Row -->
      <div class="animate__animated animate__backInDown">
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-0">
                    <div class="card-body p-8">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masuk </h1>
                                    </div>
                                    <?= $this->session->flashdata('message');?>
                                    <form class="user" method="post" action="<?= base_url('Login/masuk');?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email" name="email"
                                                placeholder="Email Address..."
                                                value="<?= set_value('email'); ?>">
                                                <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                  
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('Login/registrasi'); ?>">Buat Akun!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('Home/index');?>">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
      </div>
    </div>