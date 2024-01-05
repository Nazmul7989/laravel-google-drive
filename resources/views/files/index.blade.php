@extends('layouts.app')

@section('content')
    <div class="col-12 my-3">
        <h4>Playing with Google Drive</h4>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-4">
                <div class="card p-4 shadow mb-3">
                    <h6>Upload Image To Google Drive</h6>
                    <form action="{{ route('file-uploads.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-4 shadow mb-3">
                    <h6>Delete File from Google Drive</h6>
                    <form action="{{ route('file-uploads.destroy') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="path" class="form-label">File Path</label>
                            <input type="text" name="path" class="form-control" id="path">
                        </div>
                        <button type="submit" class="btn btn-danger">Delete File</button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-4 shadow mb-3">
                    <h6>Get file from Google Drive</h6>
                    <form action="{{ route('file-uploads.getfile') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="directory" class="form-label">Directory Name</label>
                            <input type="text" name="directory" class="form-control" id="directory">
                        </div>
                        <button type="submit" class="btn btn-primary">Get File</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-4">
                <div class="card p-4 shadow mb-3">
                    <h6>Create Directory</h6>
                    <form action="{{ route('file-uploads.create-directory') }}" class="mt-4" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="directory" class="form-label">Directory Name</label>
                            <input type="text" name="directory" class="form-control" id="directory">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Directory</button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-4 shadow mb-3">
                    <h6>Rename Directory</h6>
                    <form action="{{ route('file-uploads.rename-directory') }}" class="mt-4" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="directory" class="form-label">Directory Name</label>
                            <input type="text" name="directory" class="form-control" id="directory">
                        </div>
                        <button type="submit" class="btn btn-primary">Rename Directory</button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-4 shadow mb-3">
                    <h6>Delete Directory</h6>
                    <form action="{{ route('file-uploads.destroy-directory') }}" class="mt-4" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="directory" class="form-label">Directory Name</label>
                            <input type="text" name="directory" class="form-control" id="directory">
                        </div>
                        <button type="submit" class="btn btn-danger">Delete Directory</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <div class="col-6 mb-5">
        <div class="card p-4 shadow">
            <h4>File List</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <th scope="row">{{ $file->id }}</th>
                        <td>
                            <img src="{{ asset('/storage/'.$file->path) }}" alt="" style="width: 100px; height: 100px;">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
