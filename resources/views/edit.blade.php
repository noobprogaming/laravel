@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="update/{{ $mhs->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <table>
                            Edit<hr>
                            <tr>
                                <td>
                                    <h5>{{ $mhs->id }}</h5>
                                    <input type="text" name="name" value="{{ $mhs->name }}"><br>
                                    <input type="email" name="email" value="{{ $mhs->email }}"><br>
                                    <input type="text" name="password" value="{{ $mhs->password }}"><br>
                                    <input type="submit" value="Update">
                                </td>
                            </tr>
                        </table>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

