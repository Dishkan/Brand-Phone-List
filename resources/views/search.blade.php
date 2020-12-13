@extends('layouts.plan')

@section('search')
<div class="container">
    @if(isset($q))
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
    <table class="table table-striped">
        <tbody>
            @foreach($details as $phone)
            <tr>
                <th>Brand: </th>
                <td>{{$phone->brand}}</td>
			</tr>
			<tr>
                <th>Model: </th>
                <td>{{$phone->model}}</td>
			</tr>
			<tr>
                <th>Price: </th>
                <td>{{$phone->price}}</td>
			</tr>
			<tr>
                <th>Created year: </th>
                <td>{{$phone->created_year}}</td>
            </tr>
			<tr>
                <th>Color: </th>
                <td>{{$phone->color}}</td>
            </tr>
			<tr>
                <th>Memory: </th>
                <td>{{$phone->memory}}</td>
            </tr>
			<tr>
			  <td>
			   <a href="/" > Back </a>
			  </td>
			</tr>
            @endforeach
        </tbody>
    </table>
	@else
	<div class="container">
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Nothing was found!</td>
			</tr>
			<tr>
			  <td>
                <a href="/">
                    <button class="btn btn-info">
                        <i class="fa fa-btn fa-create"></i> Back
                    </button>
				</a>
			  </td>
			</tr>
        </tbody>
    </table>  
</div>
    @endif
</div>
@endsection
