@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Service Package
@endsection
@section('admin_layout')
    <div class="container">
        <h2>Create Packages for "{{ $service->title }}"</h2>

        <form action="{{ route('admin.service-packages.store', $service->id) }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Basic</th>
                        <th>Standard</th>
                        <th>Premium</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><input type="text" name="packages[0][name]" class="form-control" required></td>
                        <td><input type="text" name="packages[1][name]" class="form-control" required></td>
                        <td><input type="text" name="packages[2][name]" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><strong>Description</strong></td>
                        <td><textarea name="packages[0][description]" class="form-control"></textarea></td>
                        <td><textarea name="packages[1][description]" class="form-control"></textarea></td>
                        <td><textarea name="packages[2][description]" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td><strong>Price ($)</strong></td>
                        <td><input type="number" name="packages[0][price]" class="form-control" required></td>
                        <td><input type="number" name="packages[1][price]" class="form-control" required></td>
                        <td><input type="number" name="packages[2][price]" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><strong>Delivery Time (days)</strong></td>
                        <td><input type="number" name="packages[0][delivery_time]" class="form-control"></td>
                        <td><input type="number" name="packages[1][delivery_time]" class="form-control"></td>
                        <td><input type="number" name="packages[2][delivery_time]" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><strong>Revisions</strong></td>
                        <td><input type="number" name="packages[0][revisions]" class="form-control"></td>
                        <td><input type="number" name="packages[1][revisions]" class="form-control"></td>
                        <td><input type="number" name="packages[2][revisions]" class="form-control"></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Create Packages</button>
        </form>
    </div>
@endsection
