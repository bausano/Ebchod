<div class="row-90 almost-black-bg footer">
    <div class="col-12">
        <div class="area">
            <div class="col-3 area-2">
            	<h6 class="light-grey-text big">Nákup</h6>
            	<p class="grey-text medium"><a href="/faq">FAQ</a></p>
            	<p class="grey-text medium"><a href="/about">O affiliate</a></p>
            </div>        
            <div class="col-3 area-2">
            	<a href="/partners/"><h6 class="light-grey-text big">Spolupráce</h6></a>
            	<p class="grey-text medium">willsoor.cz</p>
            </div>        
            <div class="col-3 area-2">
            	<a href="/blog/"><h6 class="light-grey-text big">Blog</h6></a>
                @forelse($latestPosts as $post)
                    <a href="/blog/{{ $post->id }}/{{$post->seo}}"><p class="grey-text medium">{{ $post->name }}</p></a>
                @empty
                    <p class="italic grey-text medium">Žádné články</p>
                @endforelse
            </div>        
            <div class="col-3 area-2">
            	<h6 class="light-grey-text big">Vytvořili</h6>
            	<p class="grey-text medium">&copy; <a href="http://sleanded.com/">Sleanded codes</a> | 2016</p>
            </div>              
        </div>
    </div>

    @foreach($affiliate as $pixel) 
        <img src=" {{ $pixel->url . '/' .  $pixel->affiliate }}" style="position: absolute; visibility: hidden; width: 0px; height: 0px;">
    @endforeach
    
</div>