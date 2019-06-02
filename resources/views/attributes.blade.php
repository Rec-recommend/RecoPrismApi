@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<br>
{{dd($attributes)}}
<form method="POST" action='#' id="form">
  @csrf
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <div class="form-horizontal">
    <div class="form-body">
      <div class="form-group">
        <label class="control-label col-md-3">Attributes & weights</label>
        <div class="col-md-10 fields">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name='attribute_1' />
            </div>
            <div class="col">
              <input type="number" class="form-control" name='attribute_1_weight' />
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
  $('.add-field').click(function () {
    count++;
    var template = '<div class="row"><div class="col"><input type="text" class="form-control" name="attribute_' + count + '"/></div>' +
      ' <div class="col"><input type="number" class="form-control" name="attribute_' + count + '_weight"/></div>',
      minusButton = '<span class="btn input-group-addon delete-field btn-danger col">-</span></div>';
    var temp = $(template).insertBefore('.help-block');
    temp.append(minusButton);
  });

  $('.fields').on('click', '.delete-field', function () {
    count--;
    $(this).parent().remove();
  });

  $(function () {
    $('form').submit(function () {
      $('#result').text(JSON.stringify($('form').serializeObject()));
      return false;
    });
  });
</script>
@include('layouts.footers.auth')
@endsection