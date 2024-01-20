@extends('layouts.base_admin.base_dashboard') @section('title', 'Сменить учетную запись')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Редактирование учётной записи</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Домой</a>
                    </li>
                    <li class="breadcrumb-item active">Сменить учетную запись</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Данные сохранены успешно!</h4>
        {{ session('status') }}
      </div>
    @endif
    <form method="post" enctype="multipart/form-data">
        @csrf
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
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Введите Имя"
                                value="{{ $usr->name }}"
                                required="required"
                                autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Электронная почта (Email)</label>
                            <input
                                type="email"
                                id="inputEmail"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Введите адрес электронной почты (Email)"
                                value="{{ $usr->email }}"
                                required="required"
                                autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputFoto">Фотография профиля</label>
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($usr->user_image)
                                    <img
                                        class="elevation-3"
                                        id="prevImg"
                                        src="{{ $usr->user_image }}"
                                        width="100px"/>
                                    @else
                                    <img
                                        class="elevation-3"
                                        id="prevImg"
                                        src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}"
                                        width="100px"/>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input
                                        type="file"
                                        id="inputFoto"
                                        name="user_image"
                                        accept="image/*"
                                        class="form-control @error('user_image') is-invalid @enderror"
                                        placeholder="Загрузить фотографию профиля">
                                </div>
                            </div>

                            @error('user_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                                title="Collapse">
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
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required="required"
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
            <div class="col-12 p-2">
                <a href="javascript:history.back()" class="btn btn-secondary">Отмена</a>
                <input type="submit" value="Сменить учетную запись" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->

@endsection @section('script_footer')
<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            prevImg.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
