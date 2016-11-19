@extends('layouts.material')
@section('content')
    <div class="android-be-together-section mdl-typography--text-center">
        <div class="logo-font android-sub-slogan" @if(isset($resultClass)) style="color:{{ $resultClass  }}" @endif>{{ $resultMessage }}</div>
    </div>

@if(isset($resultRedirect))
    <script language="JavaScript">
        setTimeout(function () {
            window.location.href = "{{$resultRedirect}}";
        }, 5000);
    </script>
@endif
@endsection
