@extends ('layouts.dashboard')

@section('content')

 <p>hi {{ $customer->company }}</p>

 <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

@endsection