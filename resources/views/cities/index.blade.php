@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="table-responsive">
        <table class="table table-borderless" id="myTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Город</th>
                <th>Адрес</th>
                <th>Принадлежность</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                            <a href="{{ route('places.show', $place->id) }}">
                                {{ $place->city }}
                            </a>
                    </td>
                    <td>
                        {{ $place->address }}
                    </td>
                    <td>
                        @if($place->addressable_type === 'App\Company')
                            Компания
                        @endif
                        @if($place->addressable_type === 'App\Reception')
                            Пункт приема
                        @endif
                    </td>
                    <td>
                        {!! Form::open([
                                       'method'=>'DELETE',
                                       'route' => ['places.destroy', $place],
                                       'style' => 'display:inline'
                                   ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Delete Menu',
                                'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $places->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
@endsection

