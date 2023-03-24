@extends('layouts.app')
@section('main')

<div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
   
  <table class="table car_overview">

        <tbody>


            @foreach ($mycars as $mycar)
                
            
                    <tr>
                        <th class="table_item car_picture">
                            @if ($mycar->image == null)
                                <img src="{{ URL::asset('/img/placeholder-small.jpg') }}" alt="profile Pic" height="85"
                                    width="100">
                            @else
                                {{ $mycar->image }}
                            @endif
                        </th>
                        <td>
                            <div class="kenteken license_plate_in_list">
                                <div class="inset">
                                    <div class="blue"></div>
                                    <input type="text" name="license_plate" disabled="" value="{{ $mycar->license_plate }}"
                                        required="" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <p> €{{ $mycar->price }}</p>
                               
                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <p>{{ $mycar->make }} {{ $mycar->model }}</p>
                            </div>
                        </td>
                        <td>
                        <div class="table-item">
                            <h3><a class ="bi-trash" id="delete" href={{route('delete_car', $mycar->id)}}></a></h3>
                        </div>
                        </td>
                    </tr>
             
                @endforeach


            </tbody>
        </table>
        
@endsection