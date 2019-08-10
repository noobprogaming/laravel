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

                    <form action="store" method="post">
                        {{ csrf_field() }}
                        <table>
                            Tambah
                            <tr>
                                <td>
                                    <input type="text" name="id" placeholder="ID"><br>
                                    <input type="text" name="name" placeholder="Name"><br>
                                    <input type="email" name="email" placeholder="Email"><br>
                                    <input type="password" name="password" placeholder="Password"><br>
                                    <input type="submit" value="OK"><br>
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

