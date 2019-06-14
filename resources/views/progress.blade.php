@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
@php
$color1=$color2=$color3=$color4 = 'primary';
$progress = '0';
if($attributes_done){
  $color1 = 'primary';
  $progress = '23';
}
if($end_users_done) {
$color1 =$color2 = 'primary';
$progress = '47';
}
if($items_done) {
$color1 =$color2 = $color3 = 'primary';
$progress = '74';
}
if($rating_done || $purchase_done) {
$color1 =$color2 = $color3 = $color4= 'primary';
$progress = '100';
}
@endphp
<div class="container">
  <div class="row"><br />
    <div class="col-md-12">
      <br>
      <div class="progress">
        <!-- <div class="one primary"></div> -->
        <!-- <div class="two {{$color2}}-color"></div> -->
        <!-- <div class="three {{$color3}}-color"></div> -->
        <!-- <div class="four {{$color4}}-color"></div> -->
        
        <div class="progress-bar bg-primary" style="width:{{$progress}}%;"></div>
      </div>
      <div class="row">
        <div class="clickable col-3 text-{{$color1}}" data-toggle="modal" data-target="#addAttributes">
          Attributes
        </div>
        <div class="clickable col-3 text-{{$color2}}" data-toggle="modal" data-target="#csv">
          Users
        </div>
        <div class="clickable col-3 text-{{$color3}}" data-toggle="modal" data-target="#csv">
          Items
        </div>
        <div class="clickable col-3 text-{{$color4}}" data-toggle="modal" data-target="#csv">
          Ratings
        </div>
      </div>
      <br>
    </div>
  </div>
  <hr />
</div>
<div class="modal fade" id="addAttributes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Attributes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('storeAttributes')}}" id="form">
          @csrf
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

          <div class="form-horizontal">
            <div class="form-body">
              <div class="form-group">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                  {{ $errors->first('label')}}
                  {{ $errors->first('weight')}}
                </div>
                @endif

                <label class="control-label col-md-3">Attributes & weights</label>
                <div class="col-md-10 fields">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name='attribute_1' />
                    </div>
                    <div class="col">
                      <input type="number" class="form-control" name='attribute_1_weight' placeholder="Default weight 1" min="1" />
                    </div>

                    <span class="btn input-group-addon add-field btn-default col">+</span>
                  </div>
                  <span class="help-block">Enter List of Attributes </span>
                </div>
              </div>
            </div>
            <div class="form-actions right">
              <div class="row">
                <div class="col-md-offset-3 col-md-9">
                  <button type="submit" class="btn btn-primary next-step">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <script>
          var count = 1;
          $('.add-field').click(function() {
            count++;
            var template = '<div class="row"><div class="col"><input type="text" class="form-control" name="attribute_' + count + '"/></div>' +
              ' <div class="col"><input type="number" class="form-control" name="attribute_' + count + '_weight"/></div>',
              minusButton = '<span class="btn input-group-addon delete-field btn-danger col">-</span></div>';
            var temp = $(template).insertBefore('.help-block');
            temp.append(minusButton);
          });

          $('.fields').on('click', '.delete-field', function() {
            count--;
            $(this).parent().remove();
          });

          $(function() {
            $('form').submit(function() {
              $('#result').text(JSON.stringify($('form').serializeObject()));
              return false;
            });
          });
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="csv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Import CSVs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="card bg-light mt-3">
            <div class="card-header">
              Import your data
            </div>
            @if(Session::has('message'))
            @if(Session::has('primary'))
            <p class="alert {{ Session::get('alert-class', 'alert-primary') }}">{{ Session::get('message') }}</p>
            @else
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
            @endif
            @endif
            <div class="card-body">
              <form action="{{ route('csv.store') }}" method="POST" enctype="multipart/form-data" name="csvForm">
                @csrf
                <select onChange="document.forms.csvForm.model.value = this.value" class="form-control input-group mb-1">
                  <option value="Item">items</option>
                  <option value="User">users</option>
                  <option value="Rating">ratings</option>
                  <option value="Purchase">Purchases</option>
                </select>
                <input type="file" name="csvfile" class="form-control">
                <input type="text" name="model" value='Item' class="form-control" hidden>
                <br>
                <button class="btn btn-primary">Import CSV file</button>
              </form>
            </div>
          </div>
        </div>
        <script>
          var count = 1;
          $('.add-field').click(function() {
            count++;
            var template = '<div class="row"><div class="col"><input type="text" class="form-control" name="attribute_' + count + '"/></div>' +
              ' <div class="col"><input type="number" class="form-control" name="attribute_' + count + '_weight"/></div>',
              minusButton = '<span class="btn input-group-addon delete-field btn-danger col">-</span></div>';
            var temp = $(template).insertBefore('.help-block');
            temp.append(minusButton);
          });

          $('.fields').on('click', '.delete-field', function() {
            count--;
            $(this).parent().remove();
          });

          $(function() {
            $('form').submit(function() {
              $('#result').text(JSON.stringify($('form').serializeObject()));
              return false;
            });
          });
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
  .one,
  .two,
  .three,
  .four {
    position: absolute;
    margin-top: -10px;
    margin-left: -50px;
    z-index: 1;
    height: 40px;
    width: 40px;
    border-radius: 25px;

  }

  .clickable:hover {
    cursor: pointer;
  }

  .one {
    left: 25%;
  }

  .two {
    left: 50%;
  }

  .three {
    left: 75%;
  }

  .four {
    left: 100%;
  }

  .primary-color {
    background-color: #4989bd;
  }

  .primary-color {
    background-color: #5cb85c;
  }
</style>
@include('layouts.footers.auth')
@endsection