@extends('technologie::layouts.master')

@section('inhalt')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <table class="table datatable">
                    <thead>
                    <tr>
                        @foreach( $Columns AS $Column )
                            <th scope="col">{{ $Column }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($Technologies as $key => $Technologie)
                        @for($i = 1; $i <= 10000; $i++)
                            @if( $i == 1)
                                @php
                                    $Techno = $Technologie;
                                @endphp
                            @else
                                @if ( $Techno->getUpgrade )
                                    @php
                                        $Techno = $Techno->getUpgrade;
                                    @endphp
                                @else
                                    @php
                                        break;
                                    @endphp
                                @endif
                            @endif
                            <tr onclick="window.location.href = '{{ route('technologies.edit', $Technologie->id) }}';"
                                style="cursor: pointer;">
                                @foreach( $Columns AS $Column )
                                    <th scope="col">{{ $Techno[$Column] }}</th>
                                @endforeach
                            </tr>
                        @endfor
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
