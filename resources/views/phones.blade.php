@extends('layouts.plan')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
		
		<div class="panel-body">	
		
             <form action="/search" method="POST" role="search">
              {{ csrf_field() }}
              <div class="input-group">
              <input type="text" class="form-control" name="q"
                placeholder="Search phones using color or memory!">
			  <span class="input-group-btn">
               <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
               </button>
              </span>
              </div>
              </form>
			  
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Mobile Phone
                </div>
				
                <div class="panel-body">

				@include('errors')

                    <form action="{{ url('phone')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <table class="table table-striped task-table">

                            <tbody>

                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="brand" id="task-name" class="form-control">
	               </div>
				   </td>
                                        <td class="table-text"><div>Brand</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="model" id="task-name" class="form-control">
	               </div>
				   </td>
                                        <td class="table-text"><div>Model</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="price" id="task-name" class="form-control">
	               </div>
				   </td>
                                        <td class="table-text"><div>Price</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="created_year" id="task-name" class="form-control">
	               </div>
				   </td>
                                        <td class="table-text"><div>Created year</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="color" id="task-name" class="form-control">
	               </div>
				   </td>
                                        <td class="table-text"><div>Color</div></td>
                                    </tr>
                                    <tr>
                  <td class="table-text"><div>
                <input type="text" name="memory" id="task-name" class="form-control">
	               </div>
				   </td>
                                        <td class="table-text"><div>Memory</div></td>
                                    </tr>
                            </tbody>
                        </table>
						 <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i> Add a Phone
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($phones) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Mobile Phones
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Brand</th>
								<th>Phone model</th>
								<th>Price</th>
								<th>Created year</th>
								<th>Color</th>
								<th>Memory</th>
                            </thead>
                            <tbody>
                                @foreach ($phones as $phone)
                                    <tr>
                                        <td class="table-text"><div>{{ $phone->brand }}</div></td>
                                        <td class="table-text"><div>{{ $phone->model }}</div></td>
                                        <td class="table-text"><div>{{ $phone->price }}</div></td>
                                        <td class="table-text"><div>{{ $phone->created_year }}</div></td>
                                        <td class="table-text"><div>{{ $phone->color }}</div></td>
                                        <td class="table-text"><div>{{ $phone->memory }}</div></td>

                                        <td>
                                            <form action="{{ url('phone/'.$phone->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection