
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      @if ($whatsappStore->site_title && $whatsappStore->home_title)
        <title>{{ $whatsappStore->home_title }} | {{ $whatsappStore->site_title }}</title>
    @else
        <title>{{ $whatsappStore->store_name }}</title>
    @endif
      <script type="module" crossorigin src="{{ asset('assets/js/index-Cu5bH_nD.js') }}?1.2"></script>
      <link rel="stylesheet" crossorigin href="{{ asset('assets/js/index-BUCEsW2a.css') }}?1.3">
    </head>

    <body>
      <div id="root"></div>

    </body>
  </html>
  