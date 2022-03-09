<html>

<head>
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/plugins/fontawesome-free/css/all.min.css">
</head>

<body>


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ürün: {{ $data->title }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin_image_store', ['product_id' => $data->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Başlık</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Başlık">
                </div>
                <div class="form-group"><label for="image">Resim</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Resim Ekle</button>
                </div>
        </form>
    </div>
    <!-- /.card -->
    <table id="category" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Başlık</th>
                <th>Resim</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>{{ $image->title }}</td>
                    <td>
                        @if ($image->image)
                            <img src="{{ Storage::url($image->image) }}" height="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin_image_delete', ['product_id' => $image->product_id, 'id' => $image->id]) }}"
                            onclick="return confirm('Emin misin?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
