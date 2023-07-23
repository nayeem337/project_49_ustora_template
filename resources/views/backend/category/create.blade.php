@extends('backend.master')

@section('title', 'Add Category')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Add Category</h3>
                        </div>
                        <div class="card-body">
                            <span class="text-success">{{ Session::has('success') ? Session::get('success') : '' }}</span>
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="row mt-3">
                                    <label class="col-md-4">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4">Publication Status</label>
                                    <div class="col-md-8">
                                        <label ><input type="radio" name="status" checked value="1"> Published</label>
                                        <label ><input type="radio" name="status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-outline-success" value="Create" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
