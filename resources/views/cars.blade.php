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


            @foreach ($cars as $car)
                
            
                    <tr>
                        <th class="table_item car_picture">
                            @if ($car->image == null)
                                <img src="{{ URL::asset('/img/placeholder-small.jpg') }}" alt="profile Pic" height="85"
                                    width="100">
                            @else
                                {{ $car->image }}
                            @endif
                        </th>
                        <td>
                            <div class="kenteken license_plate_in_list">
                                <div class="inset">
                                    <div class="blue"></div>
                                    <input type="text" name="license_plate" disabled="" value="{{ $car->license_plate }}"
                                        required="" />
                                </div>
                                <div class="sale_status">
                                    @isset($car->sold_at)
                                        <p class="status_text border border-dark rounded text-light bg-danger">VERKOCHT</p>
                                    @endisset
                                    @empty($car->sold_at)
                                        <p class="status_text border border-dark rounded text-light bg-success">TE KOOP</p>
                                    @endempty
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <p> €{{ $car->price }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="table-item">
                                <p>{{ $car->make }} {{ $car->model }}</p>
                            </div>
                       
                            
                    
                        </td>
                    </tr>
                
                @endforeach


            </tbody>
        </table>
        
@endsection