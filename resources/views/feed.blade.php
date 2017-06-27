@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                My Sources
            </h1>
        </div>
    </div>

    <div class="row">
        <!-- Blog Search Well -->
        <div class="well">
            <!-- Split button -->
            <div class="btn-group">
                <button type="button" class="btn btn-danger"> Select your Interests</button>
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('interests', ['topic' => 'news']) }}">News</a></li>
                    <li><a href="{{ route('interests', ['topic' => 'politics']) }}">Politics</a></li>
                    <li><a href="{{ route('interests', ['topic' => 'sports']) }}">Sports</a></li>
                    <li><a href="{{ route('interests', ['topic' => 'business']) }}">Business</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('interests', ['topic' => 'kenya']) }}">Kenya</a></li>
                    <li><a href="{{ route('interests', ['topic' => 'uganda']) }}">Uganda</a></li>
                    <li><a href="{{ route('interests', ['topic' => 'tanzania']) }}">Tanzania</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('interests', ['topic' => 'hivisasa']) }}">Reset Page</a></li>
                </ul>
            </div>
            <!-- /.input-group -->
        </div>
    </div>

    <div class="row">
        <h2 class="page-header">
            My <a href="{{ $permalink }}">{{ $title }}</a> Sources
        </h2>
        @foreach(array_chunk($items, 3) as $item)
            <div class="row">
                @foreach($item as $newsItem)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-fw fa-edit"></i> <a href="{{ $newsItem->get_permalink() }}">{{ $newsItem->get_title() }}</a></h4>
                            </div>
                            <div class="panel-body">
                                <p>{{ $newsItem->get_description() }}</p>
                                <a href="#" class="btn btn-default">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <!-- /.row -->
@endsection