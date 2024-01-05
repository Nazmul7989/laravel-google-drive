@extends('layouts.app')

@section('content')
    <div class="col-12 my-3">
        <h4>Playing with Google Drive</h4>
    </div>
    <div class="col-md-8">
        <div class="card p-4 shadow">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card p-4 shadow">
            <form>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="card p-4 shadow mt-3">
            <form class="mt-4">
                <div class="mb-3">
                    <label for="directory" class="form-label">Directory Name</label>
                    <input type="text" name="directory" class="form-control" id="directory">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
