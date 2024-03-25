@extends('Admin.Layout')
@section('content')
    <section class="dashboard">
        <div class="col-12">
            <div class="card recent-sales overflow-auto p-4">
                <form class="email-signup" action="" method="POST" enctype='multipart/form-data'>
                    <div class="input-group mb-3">
                        <input type="file" name="Images[]" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
                    </div>
                </form>
            </div>
    </section>
@endsection
