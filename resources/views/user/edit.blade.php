@extends('layout/main')

@section('content')
<h1 class="h3">{{ $title }}</h1>
<div class="row">
    <div class="col col-md-6">
        <form action="/user/edit/{{ $user['id'] }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username', $user['username']) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                <div class="form-text">Leave blank if you don't want to change !</div>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                    <option <?= old('role', $user['role']) == 'HRD' ? 'selected' : '' ?> value="HRD">HRD</option>
                    <option <?= old('role', $user['role']) == 'Senior HRD' ? 'selected' : '' ?> value="Senior HRD">Senior HRD</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

@endsection