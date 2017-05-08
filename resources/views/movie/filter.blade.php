<form action="{{ url('movies') }}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}
    <div class="panel panel-default">
        <div class="panel-heading">Find Movies and Series</div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label class=" control-label" for="title">Title</label>
                    <input id="title" name="title" type="search" placeholder="i.g It Could Happen to You" class="form-control" value="{{old('title')}}">
                    <p class="help-block">Find by the title</p>
                </div>
                <div class="panel panel-default advanced-search-filters @if(empty($filters)) hidden @endif">
                    <div class="panel-heading">Advanced Search</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class=" control-label" for="actor">Actor</label>
                                <input id="actor" name="actor" type="search" placeholder="i.g Nicolas Cage" class="form-control" value="{{old('actor')}}">
                                <p class="help-block">Find by an actor</p>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="year">Year</label>
                                <input id="year" name="year" type="search" placeholder="i.g 2011" class="form-control" value="{{old('year')}}">
                                <p class="help-block">Find by an year</p>
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="director">Director</label>
                                <input id="director" name="director" type="search" placeholder="i.g Quentin Tarantino" class="form-control" value="{{old('director')}}">
                                <p class="help-block">Find by a director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="button" class="btn btn-warning advanced-search">Advanced Filters</button>
            <button class="btn btn-primary">See Movie</button>
        </div>
    </div>
</form>