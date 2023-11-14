@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                @forelse ($notifications as $notification)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $notification->data['title'] }}

                            <span class="pull-right">
                                @if ($notification->created_at)
                                {!! $notification->created_at->toDayDateTimeString() !!}
                            
                                @else
                                No date available
                                @endif
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{ str_limit($notification->body, 200) }}</p>
                            {!! $notification->data['body'] !!} 
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No Notifications found.</p>
                        </div>
                    </div>
                @endforelse

                <a href="{{ route('notifications.index', ['unreadOnly' => !$unreadOnly]) }}" class="btn btn-primary">
                    @if($unreadOnly)
                        Show only unread Notifications
                    @else
                        Show all Notifications
                    @endif
                </a>

            </div>

        </dev>
    </dev>
@endsection
