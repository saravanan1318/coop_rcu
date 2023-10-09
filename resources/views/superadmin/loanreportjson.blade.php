@extends('layouts.master')
@section('content')
    <?php
        print_r(json_encode($results));
        exit();
        ?>
@endsection
