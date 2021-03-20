@extends('layout')
@section('content')
<style>
.ml2 {
  font-weight: 800;
  font-size: 3.7em;
  color: black;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
}
</style>
<script src="{{asset('public/js/anime.min.js')}}"></script>
<div style="text-align: center;margin-top: 200px;margin-left: 220px">
    <h1 class="ml2">Welcome To Admin Panel</h1>
</div>
<script>
  var textWrapper = document.querySelector('.ml2');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 950,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>     
@endsection