@extends('layouts.dashboard')

@section('title', 'Pengaturan')

@section('style')
<style>
    ul.error {
        list-style-position: inside;
        padding-left: 0;
    }

    .error>.bx {
        font-size: 0.857rem;
        margin-right: 6px;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">Pengaturan</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('dashboard.setting.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-1 mb-md-0">
                                        <label for="">Mulai Check In</label>
                                        <input type="time" name="check_in_start" class="form-control" value="{{ $setting->check_in_start ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Selesai Check In</label>
                                        <input type="time" name="check_in_end" class="form-control" value="{{ $setting->check_in_end ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Mulai Check Out</label>
                                <input type="time" name="check_out_start" class="form-control" value="{{ $setting->check_out_start ?? '' }}">
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
