@extends('layouts.dashboard')

@section('title', 'Edit ' . $role)

@section('style')
    <style>
        ul.error{
            list-style-position: inside;
            padding-left: 0;
        }
        .error>.bx{
            font-size: 0.857rem;
            margin-right: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('dashboard.user.index') }}" class="btn btn-primary btn-icon">
                <span class="livicon-evo livicon-evo-holder" data-options="name: arrow-left.svg; style: lines; size: 1.2rem; strokeColor: #ffffff "></span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">{{ Auth::user()->id != $user->id ? 'Edit ' . $role : 'Edit Profile' }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="create-thumbnail">Foto Diri</label>
                                    <div class="row mb-1">
                                        <div class="col-12">
                                            <div class="d-md-flex">
                                                <div class="rounded preview-thumbnail-wrapper">
                                                    <img src="{{ $user->foto_diri }}" style="width: 100px" class="img-fluid" id="edit-thumbnail-preview">
                                                </div>
                                                <div class="px-1 mt-1 mt-md-0">
                                                    <button type="button" class="button btn btn-sm btn-light-primary btn-select-thumbnail">Pilih Foto</button>
                                                    <button type="button" class="button btn btn-sm btn-light-secondary btn-delete-thumbnail" data-checkbox-element="#delete-thumbnail-value">Hapus</button>
                                                    <p class="text-muted small mb-0">Hanya menerima file dengan format .png dan .jpg</p>
                                                    <input type="file" name="foto_diri" class="form-control d-none input-thumbnail" accept="image/png, image/jpeg, image/jpg" data-preview-element="#edit-thumbnail-preview">
                                                    <input type="checkbox" name="delete_thumbnail" id="delete-thumbnail-value" value="1" class="d-none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" class="form-control" value="{{ $user->nik }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="pria" {{ $user->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria</option>
                                        <option value="wanita" {{ $user->jenis_kelamin == 'wanita' ? 'selected' : '' }}>Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" rows="4" class="form-control">{{ $user->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    <span class="small text-muted">Abaikan jika tidak ingin mengubah password.</span>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        let indexRoute = "{{ route('dashboard.user.index') }}";
        if ($("a[href='" + indexRoute + "']")[0])
        {
            $("a[href='" + indexRoute + "']").closest("li").addClass("active");
        }

        $(document).on("click", ".btn-select-thumbnail", function()
        {
            $(this).siblings(".input-thumbnail").click();
        });

        $(document).on("change", ".input-thumbnail", function()
        {
            var previewElement = $(this).data("preview-element");
            readURL(this, previewElement);
        });

        $(document).on("click", ".btn-delete-thumbnail", function()
        {
            $(this).siblings(".input-thumbnail").val("").trigger("change");
            var checkbox = $(this).data("checkbox-element");
            if (checkbox !== undefined)
            {
                $(checkbox).prop("checked", true)
            }
        });

        function readURL(input, previewElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewElement).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }else{
                $(previewElement).attr('src', '/app-assets/images/logo/logo-ngabsen.png');
            }
        }
    </script>
@endsection
