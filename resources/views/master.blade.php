<!DOCTYPE html>
<html lang="en">

<head>
@include('header')
	<style>
		body {
		  min-height: 75rem;
		  padding-top: 4.5rem;
		}
      	.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>

<body class="grey lighten-3">
         
@yield('content')
@include('footer')    
</body>
    
</html>