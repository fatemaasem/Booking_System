@extends('layout')
@section('body')
<div class="container-xl">
	<div class="table-responsive">
        @if (Session::has("success"))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
          </div>
        @endif



		<div class="table-wrapper">
			<div class="table-title">

				<div class="row">
					<div class="col-sm-6">
						<h2>Manage<b>Categories</b></h2>
					</div>
                    @if (Auth::user()->caseUser==1)
                    <div class="col-sm-6">
						<a href="{{ url("category/add") }}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
					</div>
                    @endif

				</div>
			</div>
			<table class="table table-striped table-hover">

				<thead>
					<tr>

                        <th></th>
						<th>Name</th>

						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

                    @for ($i = 1; $i <= count($categories); $i++)


                    <tr>
                        <td scope="row">{{ $i }}</td>


						<td>{{ $categories[$i-1]->name }}</a></td>


						<td><?php $id=$categories[$i-1]->id;?>
                            @if (Auth::user()->caseUser=="1")
                            <a href=" {{ url("category/edit/$id") }}"  class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="{{ url("category/delete/$id") }}" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            @endif

                            {{-- <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> --}}
						</td>
					</tr>

                 @endfor
				{{-- make pagination --}}


				</tbody>
			</table>

			<div class="clearfix">
				<div class="hint-text"></div>
                {{ $categories->links() }}

			</div>
		</div>
	</div>
</div>
@endsection
@section('title')
    All category
@endsection
