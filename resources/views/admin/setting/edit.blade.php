@extends("layouts.admin")

@section('title', 'Ayarları Düzenle')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ayarları Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Ayarları Düzenle</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ayarları Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin_setting_update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{ $setting->id }}">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $setting->title }}">
                        </div>
                        <div class="form-group">
                            <label for="keywords">Anahtar Kelimeler</label>
                            <input type="text" name="keywords" class="form-control" id="keywords"
                                value="{{ $setting->keywords }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <input type="text" name="description" class="form-control" id="description"
                                value="{{ $setting->description }}">
                        </div>
                        <div class="form-group">
                            <label for="company">Şirket</label>
                            <input type="text" name="company" class="form-control" id="company"
                                value="{{ $setting->company }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address"
                                value="{{ $setting->address }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                value="{{ $setting->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input type="text" name="fax" class="form-control" id="fax" value="{{ $setting->fax }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ $setting->email }}">
                        </div>
                        <div class="form-group">
                            <label for="smtpserver">smtpserver</label>
                            <input type="text" name="smtpserver" class="form-control" id="smtpserver"
                                value="{{ $setting->smtpserver }}">
                        </div>
                        <div class="form-group">
                            <label for="smtpemail">smtpemail</label>
                            <input type="text" name="smtpemail" class="form-control" id="smtpemail"
                                value="{{ $setting->smtpemail }}">
                        </div>
                        <div class="form-group">
                            <label for="smtppassword">smtppassword</label>
                            <input type="password" name="smtppassword" class="form-control" id="smtppassword"
                                value="{{ $setting->smtppassword }}">
                        </div>
                        <div class="form-group">
                            <label for="smtpport">smtpport</label>
                            <input type="number" name="smtpport" class="form-control" id="smtpport"
                                value="{{ $setting->smtpport }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="facebook"
                                value="{{ $setting->facebook }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram" class="form-control" id="instagram"
                                value="{{ $setting->instagram }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input type="text" name="youtube" class="form-control" id="youtube"
                                value="{{ $setting->youtube }}">
                        </div>
                        <div class="form-group">
                            <label for="aboutus">Hakkımızda</label>
                            <textarea id="aboutus" name="aboutus">{{ $setting->aboutus }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="contact">İletişim</label>
                            <textarea id="contact" name="contact">{{ $setting->contact }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <select class="custom-select" name="status">
                                <option value="1" @if ($setting->status == 1) selected = "selected" @endif>Aktif
                                </option>
                                <option value="0" @if ($setting->status == 0) selected = "selected" @endif>Pasif
                                </option>
                            </select>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
                        </div>
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(document).ready(function() {
            $('#contact').summernote();
            $('#aboutus').summernote();
        });
    </script>
@endsection
