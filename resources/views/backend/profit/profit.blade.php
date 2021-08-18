@extends('layouts.adminLayout.admin_design')
@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1>Profit Section</h1>

    @if(Session::has('flash_message_error'))
     <div class="alert alert-error alert-block">
     	<button type="button" class="close" data-dismiss="alert">x</button>
     	<strong>{!! session('flash_message_error') !!}</strong>
     </div>
     @endif
     @if(Session::has('flash_message_success'))
     <div class="alert alert-success alert-block">
     	<button type="button" class="close" data-dismiss="alert">x</button>
     	<strong>{!! session('flash_message_success') !!}</strong>
     </div>
     @endif

  </div>




    <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Profit</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="font-size: 15px;">Brand</th>
                  <th style="font-size: 15px;">Model</th>
                  <th style="font-size: 15px;">Selling Price</th>
                  <th style="font-size: 15px;">Purchasing Price</th>
                   <th style="font-size: 15px;">Profit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($profits as $profit)
                <tr class="text-center">
                  <td style="height:2px;margin-top:-0.5em;border-width:0;color:black;text-align:center;font-size: 13px">{{ $profit->brand }}</td>
                  <td style="height:2px;margin-top:-0.5em;border-width:0;color:black;text-align:center;font-size: 13px"class="align-right">{{ $profit->model }}</td>
                  <td style="height:2px;margin-top:-0.5em;border-width:0;color:black;text-align:center;font-size: 13px"class="align-right">{{ $profit->selling }}</td>
                  <td style="height:2px;margin-top:-0.5em;border-width:0;color:black;text-align:center;font-size: 13px"class="align-right">{{ $profit->purchase }}</td>
                  <td style="height:2px;margin-top:-0.5em;border-width:0;color:black;text-align:center;font-size: 13px"class="align-right"> Tk. {{ $profit->selling - $profit->purchase }}</td>        
                </tr>

                @endforeach
                
               


              </tbody>
                             
            </table>

<div>
               
                <td colspan="5"><h4 style="padding-left: 77.5%; font-size:20px; color: black; ">Total Profit  : {{ $TotalProfit }} Tk.</hd></td>
                </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



@endsection