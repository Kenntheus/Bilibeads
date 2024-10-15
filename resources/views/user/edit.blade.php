@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Account Details</h2>
        <!-- Display flash messages -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>
            <div class="col-lg-9">
                <div class="page-content my-account__edit">
                    <!-- User Details Update Form -->
                    <div class="my-account__edit-form">
                        <form action="{{ route('user.update') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="{{ old('name', $user->name) }}" required>
                                        <label for="name">Name</label>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="{{ old('mobile', $user->mobile) }}" required>
                                        <label for="mobile">Mobile Number</label>
                                        @error('mobile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating my-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email', $user->email) }}" required>
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Password Update Form -->
                    <div class="my-account__edit-form mt-5">
                        <form action="{{ route('user.update-password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-floating my-3">
                                    <div class="col-md-12">
                                        <label for="current_password">Current Password:</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        @error('current_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-floating my-3">
                                    <div class="col-md-12">
                                        <label for="new_password">New Password:</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                                        @error('new_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-floating my-3">
                                    <div class="col-md-12">
                                        <label for="new_password_confirmation">Confirm New Password:</label>
                                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                        @error('new_password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
