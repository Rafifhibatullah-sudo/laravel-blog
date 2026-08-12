@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp
<?xml-stylesheet type="text/css" href="https://www.xml-sitemaps.com/css/sitemap.css"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">

    <url>
       <loc>{{ url('/') }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->toIso8601String()}}</lastmod>
       <changefreq>daily</changefreq>
       <priority>1.00</priority>
  </url>
    <url>
       <loc>{{ url('/articles') }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->toIso8601String()}}</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.80</priority>
  </url>
    <url>
       <loc>{{ url('/about') }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->toIso8601String()}}</lastmod>
       <changefreq>monthly</changefreq>
       <priority>0.80</priority>
  </url>
    <url>
       <loc>{{ url('/contact') }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->toIso8601String()}}</lastmod>
       <changefreq>monthly</changefreq>
       <priority>0.80</priority>
  </url>

  @foreach ($categories as $category)
      <url>
       <loc>{{ url('/category/'.$category->slug) }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d h:i:s'))->toIso8601String()}}</lastmod>
       <changefreq>daily</changefreq>
       <priority>1.00</priority>
  </url>
  @endforeach
  @foreach ($articles as $article)
      <url>
       <loc>{{ url('/p/'.$article->slug) }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse($article->updated_at->format('Y-m-d H:i:s'))->toIso8601String()}}</lastmod>
       <changefreq>daily</changefreq>
       <priority>1.00</priority>
  </url>
  @endforeach
</urlset>