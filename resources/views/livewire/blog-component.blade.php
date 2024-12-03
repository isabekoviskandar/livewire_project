<div>
    @foreach ($posts as $post)
        <div class="col-lg-4">
            <article>

            <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">{{$post->category_id}}</p>

            <h2 class="title">
                <a href="blog-details.html">{{$post->title}}</a>
            </h2>
            <h4>
                <p>{{$post->text}}</p>
            </h4>

            <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                <p class="post-author">Maria Doe</p>
                <p class="post-date">
                    <time datetime="2022-01-01">{{$post->created_at}}</time>
                </p>
                </div>
            </div>

            </article>
        </div>
        
    @endforeach
</div>
