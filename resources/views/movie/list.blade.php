<div class="col-md-12">
<!-- Three columns of text below the carousel -->
    @foreach($movies as $movie)
        <div class="col-lg-4 show-single-movie">
            <img class="img-circle" src="{{$movie['poster']}}" alt="{{$movie['show_title']}}" width="140" height="140">
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" @if(floor($movie['rating']) >= 5) style="color: #FFD700;" @endif></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" @if(floor($movie['rating']) >= 4) style="color: #FFD700;" @endif></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" @if(floor($movie['rating']) >= 3) style="color: #FFD700;" @endif></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" @if(floor($movie['rating']) >= 2) style="color: #FFD700;" @endif></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" @if(floor($movie['rating']) >= 1) style="color: #FFD700;" @endif></label>
                <label for="" style="color: #f0ad4e;">{{$movie['rating']}}</label>
            </fieldset>
            <h2>{{$movie['show_title']}}</h2>
            <span class="text-muted"> {{$movie['runtime']}} - {{$movie['release_year']}} > {{$movie['category']}} </span>
            <p>{{$movie['summary']}}</p>
            <p>Director - {{$movie['director']}}</p>
            <p>Cast - {{$movie['show_cast']}}</p>
        </div><!-- /.col-lg-4 -->
    @endforeach
</div>