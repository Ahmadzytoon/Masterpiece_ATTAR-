<!DOCTYPE html>
<html dir="rtl">
<head>
    @include('userLayout.head')
</head>
<body>
    
<!-- header section starts  -->
@include('userLayout.navbar')
<!-- header section ends -->


<!-- home section starts  -->
@yield('contant')
<!-- home section starts  -->

<!-- footer section  -->
@include('userLayout.footer')

</body>
</html>