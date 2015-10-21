@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <br><br><br>

                <h4>Instituciones registradas</h4>
                <div class="table-responsive">




                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>

                        </thead>
                        <tbody>

                        @foreach($team as $tea)
                            <tr>
                                <td>{!! $tea->id !!} </td>
                                <td>{!! $tea->name !!} </td>
                                <td>{!! $tea->gender !!} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        {!! $team->render() !!}
                    </ul>



                </div>

            </div>
        </div>
    </div>
@stop