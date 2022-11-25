@extends('layout')

@section('title')
    Technologien
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Übersetzungen</h5>
                    <form method="POST" action="{{ route('translation.store') }}">
                        @if( isset($id) )
                            <input type="hidden" name="id" value="{{$id}}">
                        @endif
                        @csrf
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">key</th>
                                <th scope="col">race</th>
                                <th scope="col">Value</th>
                                <th scope="col">Plural</th>
                                <th scope="col">Sprache</th>
                                <th scope="col">Erstellt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr >

                                <th scope="row">*</th>
                                <td><input class="form-control" style="background: #fff;" type="text"
                                           name="key" id="key" placeholder="key" value="{{ $id ?? null }}"></td>
                                <td><select name="race" class="form-select" id="inputGroupSelect"
                                            aria-label="">
                                        <option value="0" selected>Keine Rasse</option>
                                        <option value="1">E</option>
                                        <option value="2">I</option>
                                        <option value="3">K</option>
                                        <option value="4">Z</option>
                                        <option value="5">A</option>
                                    </select></td>
                                <td><input class="form-control" style="background: #fff;" type="text"
                                           name="value" id="value" placeholder="Value"></td>
                                <td><input class="form-control" style="background: #fff;" type="text"
                                           name="plural" id="plural" placeholder="plural"></td>
                                <td><select name="lang" class="form-select" id="inputGroupSelect"
                                            aria-label="">
                                        <option value="DE" selected>Deutsch</option>
                                        <option value="EN">Englisch</option>
                                        <option value="CZ">Tschechisch</option>
                                    </select></td>
                                <td>
                                    <button class="btn btn-outline-secondary" type="submit">Eintragen</button>
                                </td>

                            </tr>

                            @foreach($Translations as $Translation)
                                <tr onclick="window.location.href = '{{ route('translation.edit', $Translation->id) }}';" style="cursor: pointer;">
                                    <th scope="row">{{ $Translation->id }}</th>
                                    <td>{{ $Translation->key }}</td>
                                    <td>{{ $Translation->race }}</td>
                                    <td>{{ $Translation->value }}</td>
                                    <td>{{ $Translation->plural }}</td>
                                    <td>{{ $Translation->lang }}</td>
                                    <td>{{ $Translation->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </form>
                </div>
            </div>

            <ul class="dropdown-menu show" aria-labelledby="selectBoard">
                <li><a class="dropdown-item" href="{{ route('translation.index') }}">prefix?</a></li>
                <li><a class="dropdown-item" href="{{ route('translation.show', 'tech_name_') }}">Name</a></li>
                <li><a class="dropdown-item" href="{{ route('translation.show', 'tech_desc_') }}">Beschreibung</a></li>
            </ul>

        </div>
    </div>
@endsection
