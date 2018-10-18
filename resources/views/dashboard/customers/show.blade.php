@extends ('layouts.dashboard')

@section('content')

 <p>hi {{ $customer->firstname }}</p>

 <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

@endsection