@extends("layouts.admin")

@section('title', 'Kategori Düzenle')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kategori Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Kategori Düzenle</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kategori Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin_category_update', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $category->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <input type="text" name="description" class="form-control" id="description"
                                value="{{ $category->description }}">
                        </div>
                        <div class="form-group">
                            <label>Üst Kategori</label>
                            <select class="custom-select" name="parent_id">
                                <option value="0" value="selected">Yok</option>
                                @foreach ($categories as $c)
                                    <option @if ($c->id == $category->parent_id) selected="selected" @endif
                                        value="{{ $c->id }}">{{ $c->parents }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Anahtar Kelimeler</label>
                            <input type="text" name="keywords" class="form-control" id="keywords"
                                value="{{ $category->keywords }}">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <select class="custom-select" name="status">

                                <option value="1" @if ($category->status == 1) selected = "selected" @endif>Aktif</option>
                                <option value="0" @if ($category->status == 0) selected = "selected" @endif>Pasif</option>

                            </select>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Kategoriyi Güncelle</button>
                        </div>
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
