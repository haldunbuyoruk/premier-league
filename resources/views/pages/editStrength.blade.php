@extends('layouts.default')
@section('content')
<div style="margin: 10px auto">
    <div class="row">
        <table class="table table-hover">
            <tr>
                <td colspan="4">Edit Team Strenght</td>
            </tr>
            <tr>
                <td>Teams</td>
                <td>Is Home</td>
                <td>Strenght</td>
                <td></td>
            </tr>
            @foreach($strenght as $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>@if($value->is_home == 1) Home @else Away @endif</td>
                    <td>{{$value->strength}}</td>
                    <td>
                        <select onchange="changeStrength({{$value->id}})" class="form-control">
                            @foreach($types as $type)
                                <option value="{{$type}}" @if($type == $value->strength) selected @endif>{{$type}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <div class="row">
        <div id="chart">
        </div>
    </div>
</div>
    <script type="text/javascript">
        function changeStrength(id){
            console.log(id);
        }
    </script>
@stop