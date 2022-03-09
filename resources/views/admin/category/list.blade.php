@extends("layouts.admin")

@section('title', 'Kategoriler')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kategori Listesi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Kategoriler</li>
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
                    <h3 class="card-title">Kategori Listesi</h3>


                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-lg-3 col-sm-6 float-right"><a href="{{ route('admin_category_create') }}" type="button"
                            class="btn btn-block btn-success btn-lg">Kategori Ekle</a></div>
                    <table id="category" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori Ağacı</th>
                                <th>Başlık</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->parents }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        @if ($category->status)
                                            Aktif
                                        @else
                                            Pasif
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin_category_edit', ['id' => $category->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin_category_delete', ['id' => $category->id]) }}"
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
