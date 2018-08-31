@extends('layouts.backend')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('List of Post') }}</h3>
                        <div class="card-tools">
                            <a class="btn btn-info"
                               href="{{ route('admin.posts.create') }}">{{ __('Add New') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="raw table-filter">
                            {{ Form::open(['route'=> 'admin.posts.index','method'=> 'GET']) }}
                            <div class="col-lg-2">
                                {{ Form::select('column',$columns, $column, ['class'=> 'form-control']) }}
                            </div>
                            <div class="col-lg-2">
                                {{ Form::select('order',$orders, $order, ['class'=> 'form-control']) }}
                            </div>
                            <div class="col-lg-1">
                                {{ Form::submit(__('Sort'), ['class'=> 'btn btn-info']) }}
                            </div>
                            <div class="col-lg-6">
                                {{ Form::search('search', $search, ['class'=> 'form-control','placeholder' => __('Search Item')]) }}
                            </div>
                            <div class="col-lg-1">
                                {{ Form::submit(__('Search'), ['class'=> 'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                        </div>

                        <table class="table table-bordered table-customize">
                            <tr>
                                <th class="text-center" style="width: 10px">{{ __("ID") }}</th>
                                <th>{{ __("Title") }}</th>
                                <th>{{ __("Category") }}</th>
                                <th>{{ __("Tags") }}</th>
                                <th>{{ __("Published") }}</th>
                                <th style="width: 40px">{{ __("Action") }}</th>
                            </tr>

                            @forelse($posts as $post)
                                <tr>
                                    <td class="text-center">{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ join(', ', $post->tags->pluck('name')->toArray()) }}</td>
                                    <td>{{ $post->is_publish ? __('Yes') : __('No') }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning"
                                           href="{{ route('admin.posts.edit',$post->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">{{ __("No category found.") }}</td>
                                </tr>
                            @endforelse

                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $posts->appends(['column'=>Request::get('column'),'order'=>Request::get('order'), 'search'=>Request::get('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection