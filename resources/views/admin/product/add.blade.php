@extends("layouts.admin")

@section('title', 'Ürün Ekle')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ürün Ekle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Ürün Ekle</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ürün Ekle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin_product_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Başlık">
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Açıklama">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="custom-select" name="category_id">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Fiyat</label>
                            <input type="text" name="price" class="form-control" id="price" value="0">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Miktar</label>
                            <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Miktar">
                        </div>
                        <div class="form-group">
                            <label for="minquantity">Minimum Miktar</label>
                            <input type="text" name="minquantity" class="form-control" id="minquantity" value="5">
                        </div>
                        <div class="form-group">
                            <label for="tax">Vergi</label>
                            <input type="text" name="tax" class="form-control" id="tax" value="18">
                        </div>
                        <div class="form-group">
                            <label for="detail">Detaylar</label>
                            <textarea id="detail" name="detail"></textarea>
                            <script>
                                $(document).ready(function() {
                                    $('#detail').summernote();
                                });
                            </script>
                        </div>
                        <div class="form-group"><label for="image">Resim</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select class="custom-select" name="status">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>

                            </select>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ürün Ekle</button>
                        </div>
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
