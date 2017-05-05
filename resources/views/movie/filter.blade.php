<form action="{{ url('movies') }}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}
    <fieldset>
        <!-- Form Name -->
        <legend>Find Movies and Series</legend>

        <!-- Search input-->
        <div class="form-group">
            <label class=" control-label" for="title">Title</label>
            <input id="title" name="title" type="search" placeholder="E.g It Could Happen to You" class="form-control" value="{{old('title')}}">
            <p class="help-block">Find by the title</p>
        </div>

        <div class="advanced-search-filters @if(empty($filters)) hidden @endif">

            <!-- Search input-->
            <div class="form-group">
                <h4>Advanced Search</h4>
            </div>
            <div class="form-group">
                <label class=" control-label" for="actor">Actor</label>
                <input id="actor" name="actor" type="search" placeholder="E.g Nicolas Cage" class="form-control" value="{{old('actor')}}">
                <p class="help-block">Find by an actor</p>
            </div>
            <div class="form-group">
                <label class=" control-label" for="year">Actor</label>
                <input id="year" name="year" type="search" placeholder="E.g 2011" class="form-control" value="{{old('year')}}">
                <p class="help-block">Find by an year</p>
            </div>
            <div class="form-group">
                <label class=" control-label" for="director">Director</label>
                <input id="director" name="director" type="search" placeholder="E.g Quentin Tarantino" class="form-control" value="{{old('director')}}">
                <p class="help-block">Find by a director</p>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <button type="button" class="btn btn-warning advanced-search">Advanced Filters</button>
            <button class="btn btn-primary">See Movie</button>
        </div>

    </fieldset>
</form>
