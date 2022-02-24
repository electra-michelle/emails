@extends('layouts.app')

@section('content')
	<div class="container">
		@auth
			<div class="row">
				<div class="col-md-4 mb-3">
					<div class="card">
					  <div class="card-header">
						Emails in database
					  </div>
					  <div class="card-body">
					    {{ $totalEmails }}
					  </div>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="card">
					  <div class="card-header">
						Emails to send
					  </div>
					  <div class="card-body">
						{{ $unsentEmails }}
					  </div>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="card">
					  <div class="card-header">
						Email sent
					  </div>
					  <div class="card-body">
						{{ $sentEmails }}
					  </div>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="card">
					  <div class="card-header">
						Sending...
					  </div>
					  <div class="card-body">
						{{ $sendingEmails }}
					  </div>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="card">
					  <div class="card-header">
						Clicked emails
					  </div>
					  <div class="card-body">
						{{ $clickedEmails }}
					  </div>
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<div class="card">
					  <div class="card-header">
						Opened emails
					  </div>
					  <div class="card-body">
					  {{ $openedEmails }}
					  </div>
					</div>
				</div>
			</div>
		@else
			<div class="alert alert-danger" role="alert">
				{{ __('Please, login') }}
			</div>
		@endauth
	</div>
@endsection
