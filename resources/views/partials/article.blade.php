<a href="/blog/{{ $post->id }}/{{ $post->seo }}">
	<article>	
	    <img src="/uploads/{{ $post->img }}" alt="">
	    <div class="area">
	        <h4 class="dark-grey-text left">{{ $post->name }}</h4>
	        <p class="dark-grey-text justify"><?= str_limit($post->content, 200) ?></p>
	    </div>
	</article>
</a>