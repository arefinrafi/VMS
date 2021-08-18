<!DOCTYPE html>
<html lang="en">
<head>
<title> Wheels Heaven Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/uniform.css') }}" />
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/matrix-media.css') }}" />

<link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin/css/jquery.gritter.css') }}" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    @yield('style', false)
</head>
<body>

@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')

@yield('content')

@include('layouts.adminLayout.admin_footer')



<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>
<script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script>
 
<!--<script src="{{ asset('js/backend_js/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/fullcalendar.min.js') }}"></script> 
 
<script src="{{ asset('js/backend_js/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('js/backend_js/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.interface.js') }}"></script> 
<script src="{{ asset('js/backend_js/matrix.chat.js') }}"></script> 
 

<script src="{{ asset('js/backend_js/jquery.wizard.js') }}"></script> 
 
  
<script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script> -->

</body>
</html>
