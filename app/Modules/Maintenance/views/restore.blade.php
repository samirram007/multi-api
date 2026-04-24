@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Database Restore</h2>
    <form method="POST" action="{{ route('maintenance.restore') }}">
        @csrf
        <div class="mb-3">
            <label for="file">Backup File Path</label>
            <input type="text" name="file" id="file" class="form-control" placeholder="e.g. storage/app/private/maintenance/backup_20260414_120000.sql">
        </div>
        <button type="submit" class="btn btn-danger">Restore</button>
    </form>
    @if(session('restored'))
        <div class="alert alert-success mt-3">Database restored successfully!</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection
