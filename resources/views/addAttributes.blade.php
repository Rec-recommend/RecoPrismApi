@extends('layouts.app', ['title' => __('Attributes Management')])

@section('content')
@include('users.partials.header', ['title' => __('Add Attributes')])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">{{ __('Attributes Management') }}</h3>
            </div>
            <div class="col-4 text-right">
              <a href="{{ route('indexAttributes') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
            </div>
          </div>
        </div>
        <div class="card-body">
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
              <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
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
  @include('layouts.footers.auth')
</div>
@endsection