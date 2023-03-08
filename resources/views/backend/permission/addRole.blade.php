@extends('backend.layout')
@section('addRole')
    <form method="post">
        Name Role
        <input type="text" name="nameRole" required/>
        <button class="btn btn-success" type="submit">Add role</button>
        @csrf
    </form>
@endsection
