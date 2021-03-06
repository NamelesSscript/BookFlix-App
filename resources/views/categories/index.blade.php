@extends('layouts.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h2 mb-0 text-gray-800">Categories </h1>
    </div>

        <div class="card">
          <form>
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search for a Category here..." aria-label="Search" name="search" id="search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
          <div>
            @if (session()->has('message'))
            <div class="alert alert-info">
              {{  session('message') }}
          </div>
          @endif
          </div>

            <div class="card-header">
               <h3 class="h4 mb-0 text-gray-800">  <a class="btn-sm btn-info" href="{{route('categories.create') }}" class="float-left"> + Add New </a> </h3>
            </div>

        </div>
        <div class="card-body">
    <table class="table  table-striped"  id="category_table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">sub_category</th>
      <th scope="col">Added date </th>

    </tr>
  </thead>
  <tbody>
      @foreach ($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->description}}</td>
      <td>{{$category->sous_category}}</td>
      <td>{{$category->created_at}}</td>

      <td>
        <a class="btn-sm btn-primary" href="{{route('categories.edit',$category->id)}}">Modify</a>
        <th>   <form method="POST" action="{{route('categories.destroy',$category->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn-sm btn-danger">Delete</button>
            </form> </th>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
    </div>

    <script>
      $(document).ready(function()
      { $('#search').keyup(function(){
          search_table($(this).val());  });
      function search_table(value){
          $('#category_table tr').each(function()
          { var found = 'false';
          $(this).each(function(){
              if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
              { found = 'true';  } });
          if(found == 'true') { $(this).show();  }
          else  { $(this).hide();  }
          });  }
      });
  </script>

@endsection
