@if (Session::has('info'))
<div class="clearfix"></div>
<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(1500, function(){
        $(this).remove();
    });
}, 2000);
</script>
<div class="alert alert-info" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('info') !!}
</div>
@endif

@if (Session::has('success'))
<div class="clearfix"></div>
<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(1500, function(){
        $(this).remove();
    });
}, 2000);
</script>
<div class="alert alert-success alert-dismissable fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('success') !!}
</div>
@endif

@if (Session::has('warning'))
<div class="clearfix"></div>
<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(1500, function(){
        $(this).remove();
    });
}, 2000);
</script>
<div class="alert alert-warning" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('warning') !!}
</div>
@endif

@if (Session::has('error'))
<div class="clearfix"></div>
<div class="alert alert-danger" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('error') !!}
</div>
@endif
