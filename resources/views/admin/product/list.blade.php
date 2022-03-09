@extends("layouts.admin")

@section('title', 'Ürünler')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ürün Listesi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Ürünler</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ürün Listesi</h3>


                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-lg-3 col-sm-6 float-right"><a href="{{ route('admin_product_create') }}" type="button"
                            class="btn btn-block btn-success btn-lg">Ürün Ekle</a></div>
                    <table id="category" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Başlık</th>
                                <th>Miktar</th>
                                <th>Fiyat</th>
                                <th>Resim</th>
                                <th>Resim Galerisi</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ Storage::url($product->image) }}" height="30">
                                        @endif
                                    </td>
                                    <td>
                                        <a
                                            onclick="openImageGallery('{{ route('admin_image_create', ['product_id' => $product->id]) }}')"><i
                                                class="fa fa-images"></i></a>
                                    </td>
                                    <td>
                                        @if ($product->status)
                                            Aktif
                                        @else
                                            Pasif
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin_product_edit', ['id' => $product->id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin_product_delete', ['id' => $product->id]) }}"
                                            onclick="areYouSure()"><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footer')
    <script src="{{ asset('assets') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $('#category').DataTable({
                "autoWidth": false,
                "responsive": true,
            });
        })
    </script>
@endsection
