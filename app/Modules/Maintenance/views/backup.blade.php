@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Database Backup</h2>
    <form method="POST" action="{{ route('maintenance.backup') }}">
        @csrf
        <div class="mb-3">
            <label for="tables">Tables (comma separated, optional)</label>
            <input type="text" name="tables" id="tables" class="form-control" placeholder="e.g. users,posts">
        </div>
        <div class="mb-3">
            <label><input type="checkbox" name="structure" value="1" checked> Structure</label>
            <label><input type="checkbox" name="data" value="1" checked> Data</label>
        </div>
        <div class="mb-3">
            <label for="format">Format</label>
            <select name="format" id="format" class="form-control">
                <option value="sql">SQL</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Backup</button>
    </form>
    @if(session('file'))
        <div class="alert alert-success mt-3">
            Backup created: <a href="{{ asset(str_replace(base_path('public'), '', session('file'))) }}" target="_blank">Download</a>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection
