@extends('layout.Layout')
   
@section('content')
 <div class="row">
  <div class="col-sm-6">
    <h4>Challenge List</h4>
  </div>
  <div class="col-sm-6 text-right">
    <a href="{{ route('challenges.create') }}" class="btn btn-success mb-2">Add</a> 
  </div>
</div>
 
 <div class="row">
      <div class="col-12">          
        <table class="table table-bordered" id="laravel_crud">
         <thead>
            <tr>
               <th>Id</th>
               <th>Title</th>
               <th>Description</th>
               <th>Start Date</th>
               <th>End Date</th>
               <th>Status</th>
              
               <th colspan="2" class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($challenges as $challenge)
            <tr>
               <td>{{ $challenge->id }}</td>
               <td>{{ $challenge->title }}</td>
               <td>{{ $challenge->description }}</td>
               <td>{{ $challenge->startDate }}</td>
               <td>{{ $challenge->endDate }}</td>
               @if( $current > $challenge->endDate )
               <td><font size="3" color="red">Closed</font>
               <i style='font-size:24px;color:red' class='far'>&#xf119;</i></td>
               @else
               <td>
               <font size="3"  color="green">Ongoing</font>
               <i style='font-size:24px;color:green'  class='fas'>&#xf581;</i></td>
               @endif
               <td class="text-center">
                <a href="{{ route('challenges.edit',$challenge->id)}}" class="btn btn-primary">Edit</a></td>
               <td class="text-center">
               <form action="{{ route('challenges.destroy', $challenge->id)}}" method="post">
                {{ csrf_field() }}
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              </td>
            </tr>
            @endforeach
 
            @if(count($challenges) < 1)
              <tr>
               <td colspan="10" class="text-center">There are no challenge available yet!</td>
              </td>
            </tr>
            @endif
         </tbody>
        </table>
        {!! $challenges->links() !!}
     </div> 
 </div>
 @endsection  