<?php $__env->startSection('title', 'Добавить учетную запись
'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Добавить учетную запись</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>">Домой</a>
                    </li>
                    <li class="breadcrumb-item active">Добавить учетную запись</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <?php if(session('status')): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Успешный!</h4>
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Информация о персональных данных</h3>

                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-tool"
                                data-card-widget="collapse"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Имя</label>
                            <input
                                type="text"
                                id="inputName"
                                name="name"
                                class="form-control <?php $__errorArgs = ['name'];
                                $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                if ($__bag->has($__errorArgs[0])) :
                                if (isset($message)) { $__messageOriginal = $message; }
                                $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                                endif;
                                unset($__errorArgs, $__bag); ?>"
                                placeholder="Введите Имя"
                                value="<?php echo e(old('name')); ?>"
                                required="required"
                                autocomplete="name">
                            <?php $__errorArgs = ['name'];
                            $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                            if ($__bag->has($__errorArgs[0])) :
                            if (isset($message)) { $__messageOriginal = $message; }
                            $message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
                            if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                            endif;
                            unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input
                                type="email"
                                id="inputEmail"
                                name="email"
                                class="form-control <?php $__errorArgs = ['email'];
                                $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                if ($__bag->has($__errorArgs[0])) :
                                if (isset($message)) { $__messageOriginal = $message; }
                                $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                                endif;
                                unset($__errorArgs, $__bag); ?>"
                                placeholder="Введите адрес электронной почты"
                                value="<?php echo e(old('email')); ?>"
                                required="required"
                                autocomplete="email">
                            <?php $__errorArgs = ['email'];
                            $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                            if ($__bag->has($__errorArgs[0])) :
                            if (isset($message)) { $__messageOriginal = $message; }
                            $message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
                            if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                            endif;
                            unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputFoto">Фотография профиля</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        class="elevation-3"
                                        id="prevImg"
                                        src="<?php echo e(asset('vendor/adminlte3/img/user2-160x160.jpg')); ?>"
                                        width="150px"/>
                                </div>
                                <div class="col-md-8">
                                    <input
                                        type="file"
                                        id="inputFoto"
                                        name="user_image"
                                        accept="image/*"
                                        class="form-control <?php $__errorArgs = ['user_image'];
                                        $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                        if ($__bag->has($__errorArgs[0])) :
                                        if (isset($message)) { $__messageOriginal = $message; }
                                        $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                        if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                                        endif;
                                        unset($__errorArgs, $__bag); ?>"
                                        placeholder="Загрузить фотографию профиля">
                                </div>
                            </div>

                            <?php $__errorArgs = ['user_image'];
                            $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                            if ($__bag->has($__errorArgs[0])) :
                            if (isset($message)) { $__messageOriginal = $message; }
                            $message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
                            if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                            endif;
                            unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Пароль</h3>

                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-tool"
                                data-card-widget="collapse"
                                title="Свернуть">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input
                                id="password"
                                type="password"
                                placeholder="Пароль"
                                class="form-control <?php $__errorArgs = ['password'];
                                $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                if ($__bag->has($__errorArgs[0])) :
                                if (isset($message)) { $__messageOriginal = $message; }
                                $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                                endif;
                                unset($__errorArgs, $__bag); ?>"
                                name="password"
                                required="required"
                                autocomplete="new-password">
                                <?php $__errorArgs = ['password'];
                                $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                if ($__bag->has($__errorArgs[0])) :
                                if (isset($message)) { $__messageOriginal = $message; }
                                $message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
                                if (isset($__messageOriginal)) { $message = $__messageOriginal; }
                                endif;
                                unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Подтвердите пароль</label>
                            <input
                                placeholder="Повторно введите пароль"
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                required="required"
                                autocomplete="new-password">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Отмена</a>
                <input type="submit" value="Добавить учетную запись" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?> <?php $__env->startSection('script_footer'); ?>
<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            prevImg.src = URL.createObjectURL(file)
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base_admin.base_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\OpenServer\domains\Laravel\backpack\pro\LaravelAdminLTE.loc\LaravelLTE\resources\views/page/admin/score/addScore.blade.php ENDPATH**/ ?>
